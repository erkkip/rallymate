<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\StageResultSet;
use App\Models\Stage;
use App\Models\StageResult;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Timetable extends Component
{
    public Stage $stage;

    public array $results;

    public bool $isTotals;

    public function mount()
    {
        $this->updateResults();
    }

    public function setTime(int $driverId)
    {
        StageResult::updateOrCreate(
            ['driver_id' => $driverId, 'stage_id' => $this->stage->id, 'rally_id' => $this->stage->rally_id],
            ['time' => $this->results[$driverId]['time']],
        );

        Toaster::info('Time set');

        $this->dispatch(StageResultSet::class);
    }

    #[On(StageResultSet::class)]
    public function updateResults()
    {
        $drivers = $this->stage->rally->drivers()->get();

        $results = $this->stage->results()->orderBy('time')->get();

        $calculatedResults = [];
        $previousResult = $firstResult = null;

        if ($this->isTotals) {
            $totalTimes = $this->stage->rally
                ->results()
                ->where('stage_id', '<=', $this->stage->id)
                ->groupBy('driver_id')
                ->selectRaw('driver_id, sum(time) as time')
                ->orderBy('time')
                ->get();
            $totalResults = clone $results;

            foreach ($totalResults as $result) {
                $result->time = $totalTimes->where('driver_id', $result->driver_id)->first()->time;
            }
            $results = $totalResults->sortBy(fn (StageResult $r) => $r->getAttributes()['time']);
        }

        /** @var StageResult $result */
        foreach ($results as $result) {
            $calculatedResults[$result->driver->id] = [
                'driverId' => $result->driver->id,
                'stageId' => $this->stage->id,
                'driver' => $result->driver->name,
                'time' => $result->time,
                'diffFirst' => $firstResult ? $result->timeDiffWith($firstResult) : '-',
                'diffPrev' => $firstResult ? $result->timeDiffWith($previousResult) : '-',
            ];

            if ($firstResult === null) {
                $firstResult = $result;
            }
            $previousResult = $result;
        }

        foreach ($drivers as $driver) {
            if (!isset($calculatedResults[$driver->id])) {
                $calculatedResults[$driver->id] = [
                    'driverId' => $driver->id,
                    'stageId' => $this->stage->id,
                    'driver' => $driver->name,
                    'time' => null,
                    'diffFirst' => null,
                    'diffPrev' => null,
                ];
            }
        }

        $this->results = $calculatedResults;
    }

    public function render()
    {
        return view('livewire.rally.timetable');
    }
}
