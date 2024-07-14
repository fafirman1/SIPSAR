<?php

use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\GuruController;
use App\Http\Controllers\API\PengumumanController;
use App\Http\Controllers\API\ProfileController;
use App\Models\Guru;
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

Route::get('profiles', [ProfileController::class, 'index']);
Route::get('guru', [GuruController::class, 'index']);
Route::get('pengumuman', [PengumumanController::class, 'index']);
Route::get('event', [EventController::class, 'index']);

// Route::apiResource('profiles', \App\Http\Controllers\API\ProfileController::class)->middleware('auth:sanctum');
