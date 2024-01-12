<?php

use App\Livewire\Home;
use App\Livewire\Rally\View;
use App\Livewire\Rally\ViewStage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('rallies.list');
Route::get('/rallies/{rally}', View::class)->name('rally.show');
Route::get('/rallies/{rally}/stages/{stage}', ViewStage::class)->name('rally.show-stage');
