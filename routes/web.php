<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StandingsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/klasemen', [StandingsController::class, 'index']);


Route::get('/Hasil-Pertandingan', [ResultController::class, 'index']);
Route::get('/Hasil-Pertandingan/create', [ResultController::class, 'create']);
Route::post('/Hasil-Pertandingan/process', [ResultController::class, 'store']);


Route::get('/data-klub', [ClubController::class, 'index']);
Route::get('/data-klub/create', [ClubController::class, 'create']);
Route::post('/data-klub/createProsses', [ClubController::class, 'store']);