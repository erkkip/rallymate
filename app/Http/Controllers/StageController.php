<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Rally;
use App\Models\Stage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Rally $rally)
    {
        return $rally->stages;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Rally $rally, StoreStageRequest $request)
    {
        return $rally->stages()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Rally $rally, Stage $stage)
    {
        return $stage;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStageRequest $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        //
    }
}
