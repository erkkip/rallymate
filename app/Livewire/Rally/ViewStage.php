<?php

namespace App\Livewire\Rally;

use App\Livewire\Events\StageResultSet;
use App\Models\Rally;
use App\Models\Stage;
use Livewire\Component;

class ViewStage extends Component
{
    public Rally $rally;

    public Stage $stage;

    public int $stageNumber;

    public function mount()
    {
        $stages = $this->rally->stages()->oldest()->get();

        $stageNumber = 0;
        foreach ($stages as $stage) {
            $stageNumber++;
            if ($stage->id === $this->stage->id) {
                break;
            }
        }

        $this->stageNumber = $stageNumber;
    }

    public function render()
    {
        return view('livewire.rally.view-stage');
    }
}
