<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\RallyController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StageResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    return 'Hello World';
});

Route::resource('rallies', RallyController::class);
Route::resource('rallies.stages', StageController::class);
Route::resource('rallies.drivers', DriverController::class);
Route::resource('rallies.stages.results', StageResultController::class)->only('index');
Route::resource('rallies.stages.drivers.results', StageResultController::class)->only('store');
