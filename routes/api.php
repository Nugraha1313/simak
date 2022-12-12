<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\TahunAkademikController;
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

// Tugas 2 API
// Route::get('/tahunakademik', [TahunAkademikController::class, 'index']);
Route::get('/tahunakademik/{id}', [TahunAkademikController::class, 'show']);
Route::post('/tahunakademik-create',[TahunAkademikController::class, 'store']);

Route::get('/tahunakademik', 'App\Http\Controllers\Api\TahunAkademikController@index');
