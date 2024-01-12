<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStageResultRequest;
use App\Http\Requests\UpdateStageResultRequest;
use App\Models\Driver;
use App\Models\Rally;
use App\Models\Stage;
use App\Models\StageResult;

class StageResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Rally $rally, Stage $stage)
    {
        $results = $stage->results()->orderBy('time')->get();

        $table = [];
        $pos = 1;
        $previousResult = null;

        foreach ($results as $result) {
            $table[] = [
                'pos' => $pos,
                'driver' => $result->driver->name,
                'time' => $result->time,
                'diffWithPrevious' => $previousResult ? $result->timeDiffWith($previousResult) : '-',
                'diffWithLeader' => $pos > 1 ? $result->timeDiffWith($results->first()) : '-',
            ];

            $previousResult = $result;
            $pos++;
        }

        return $table;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Rally $rally, Stage $stage, Driver $driver, StoreStageResultRequest $request)
    {
        $stageResult = new StageResult($request->validated());
        $stageResult->rally()->associate($rally);
        $stageResult->stage()->associate($stage);
        $stageResult->driver()->associate($driver);
        $stageResult->save();

        return $stageResult;
    }

    /**
     * Display the specified resource.
     */
    public function show(StageResult $stageResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStageResultRequest $request, StageResult $stageResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StageResult $stageResult)
    {
        //
    }
}
