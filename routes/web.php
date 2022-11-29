<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DashboardMahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DashboardMahasiswaKrsController;

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
Route::prefix('administrator')->group(function () {
    Route::get('/', [AdministratorController::class, 'index'])->name('administrator');

    // KURIKULUM
    Route::get('/kurikulum', function () {
        return view('admin.kurikulum.index');
    });

    // MATKUL
    Route::get('/mata-kuliah', function () {
        return view('admin.matkul.index');
    });

    // TAHUN AKADEMIK
    Route::get('/tahun-akademik', function () {
        return view('admin.tahun.index');
    });

    // RUANGAN
    Route::get('/ruangan', function () {
        return view('admin.ruangan.index');
    });

    // DOSEN
    Route::resource('dosen', DosenController::class);

    // MAHASISWA
    Route::resource('mahasiswa', MahasiswaController::class);
});


//================= MAHASISWA =================
Route::prefix('dashboard/mahasiswa')->group(function () {
    Route::get('/', [DashboardMahasiswaController::class, 'index'])->name('dashboard.mahasiswa');

    // JADWAL
    Route::get('/jadwal', [JadwalController::class, 'indexDashboardMahasiswa']);
    Route::get('/jadwal/pdf', [PDFController::class, 'jadwalMahasiswaPDF']);

    // KRS
    Route::resource('krs', DashboardMahasiswaKrsController::class);

    // KHS
    Route::get('/khs', function () {
        return view('mahasiswa.khs.index');
    });
});
