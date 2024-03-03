<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);
Route::get('/vehicles', VehiclesController::class)->name('vehicles');
Route::get('/vehicle/{vehicle}', VehicleController::class)->name('vehicle');
Route::get('/characters', CharactersController::class)->name('characters');
Route::get('/character/{name}', CharacterController::class)->name('character');
Route::get('/quest/{mission}', QuestController::class)->name('quest');
Route::get('/about', AboutController::class)->name('about');
