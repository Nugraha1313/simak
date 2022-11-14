<?php

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

Route::get('/', function () {
    return view('landingpage.index');
})->name('home');

//================= ADMIN ==================
Route::prefix('administrator.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('administrator');

    // TAHUN AKADEMIK
    Route::get('/tahun-akademik', function () {
        return view('admin.tahun.index');
    });

    // DOSEN
    Route::get('/dosen', function () {
        return view('admin.dosen.index');
    });

    // MAHASISWA
    Route::get('/mahasiswa', function () {
        return view('admin.mahasiswa.index');
    });
});


//================= MAHASISWA =================
Route::prefix('dashboard/mahasiswa')->group(function () {
    Route::get('/', function () {
        return view('mahasiswa.index');
    })->name('dashboard.mahasiswa');

    // JADWAL
    Route::get('/jadwal', function () {
        return view('mahasiswa.jadwal.index');
    });

    // KRS
    Route::get('/krs', function () {
        return view('mahasiswa.krs.index');
    });

    // KHS
    Route::get('/khs', function () {
        return view('mahasiswa.khs.index');
    });
});
