<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use App\Models\Rally;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Rally $rally)
    {
        return $rally->drivers;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Rally $rally, StoreDriverRequest $request)
    {
        return $rally->drivers()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return $driver;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
