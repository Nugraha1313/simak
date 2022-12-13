<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\KrsController;
use App\Http\Controllers\API\MatkulController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('jadwal', [JadwalController::class, 'all']);
// Route::get('jadwal', 'API\JadwalController@all');

Route::get('matkul', [MatkulController::class, 'index']);
Route::get('matkul/{id}', [MatkulController::class, 'show']);
Route::post('matkul', [MatkulController::class, 'store']);
Route::put('matkul/{id}/edit', [MatkulController::class, 'update']);
Route::delete('matkul/{id}', [MatkulController::class, 'destroy']);