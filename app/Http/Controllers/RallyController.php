<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRallyRequest;
use App\Http\Requests\UpdateRallyRequest;
use App\Models\Rally;

class RallyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rally::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRallyRequest $request)
    {
        return Rally::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Rally $rally)
    {
        return $rally;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRallyRequest $request, Rally $rally)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rally $rally)
    {
        //
    }
}
