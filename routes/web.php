<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', function () {
    return view('landingpage.index');
})->name('home');

//================= ADMIN ==================
Route::middleware('auth:administrator')->group(function () {
    Route::get('/', [HomeController::class, 'dashboardAdministrator'])->name('administrator');

    // KURIKULUM
    Route::resource('/kurikulum', JadwalController::class);
    // Route::get('/kurikulum', function () {
    //     return view('admin.kurikulum.index');
    // });

    // MATKUL
    Route::resource('/mata-kuliah', MatkulController::class);
    // Route::get('/mata-kuliah', function () {
    //     return view('admin.matkul.index');
    // });

    // TAHUN AKADEMIK
    Route::resource('/tahun-akademik', TahunAkademikController::class);
    Route::post('/tahun-akademik/{tahun_akademik}', [TahunAkademikController::class, 'activeAyear'])->name('tahun-akademik.activeAyear');
    // Route::get('/tahun-akademik', function () {
    //     return view('admin.tahun.index');
    // });

    // RUANGAN
    Route::resource('/ruangan', RuanganController::class);
    // Route::get('/ruangan', function () {
    //     return view('admin.ruangan.index');
    // });

    // DOSEN
    Route::resource('/dosen', DosenController::class);
    // Route::get('/dosen', function () {
    //     return view('admin.dosen.index');
    // });

    // MAHASISWA
    Route::resource('/mahasiswa', MahasiswaController::class);
    // Route::get('/mahasiswa', function () {
    //     return view('admin.mahasiswa.index');
    // });
});

//================= MAHASISWA =================
Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/dashboard/mahasiswa', [HomeController::class, 'dashboardMahasiswa'])->name('dashboard.mahasiswa');

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

//================= DOSEN =================
Route::middleware('auth:dosen')->group(function () {
    Route::get('/dashboard/dosen', [HomeController::class, 'dashboardDosen'])->name('dashboard.dosen');

    // JADWAL
    Route::get('/jadwal', function () {
        return view('mahasiswa.jadwal.index');
    });

    // NILAI
    Route::resource('/nilai', NilaiController::class);
    Route::get('/list-nilaiMahasiswa', [NilaiController::class, 'listNilai'])->name('nilai.listNilai');
    // Route::get('/krs', function () {
    //     return view('mahasiswa.krs.index');
    // });
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'firstlogin'])->name('login');
Route::post('/lastlogin', [AuthController::class, 'lastlogin'])->name('lastlogin');
Route::post('/', [AuthController::class, 'logout'])->name('logout');

//---- Tugas 1 Rest API-----
Route::get('/api-dosen', [DosenController::class, 'apiDosen']);
Route::get('/api-dosen/{id}', [DosenController::class, 'apiDosenDetail']);
Route::get('/api-mahasiswa', [MahasiswaController::class, 'apiMahasiswa']);
Route::get('/api-mahasiswa/{id}', [MahasiswaController::class, 'apiMahasiswaDetail']);
