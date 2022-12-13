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
use App\Http\Controllers\KrsController;

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
Route::middleware('auth:administrator')->prefix('administrator')->group(function () {
    Route::get('/', [HomeController::class, 'dashboardAdministrator'])->name('administrator');

    // KURIKULUM
    Route::resource('/kurikulum', JadwalController::class);

    // MATKUL
    Route::resource('/mata-kuliah', MatkulController::class);

    // TAHUN AKADEMIK
    Route::resource('/tahun-akademik', TahunAkademikController::class);
    Route::post('/tahun-akademik/{tahun_akademik}', [TahunAkademikController::class, 'activeAyear'])->name('tahun-akademik.activeAyear');

    // RUANGAN
    Route::resource('/ruangan', RuanganController::class);

    // DOSEN
    Route::resource('/dosen', DosenController::class);
    
    // MAHASISWA
    Route::resource('/mahasiswa', MahasiswaController::class);

});
    
    //================= MAHASISWA =================
    Route::middleware('auth:mahasiswa')->prefix('dashboard/mahasiswa')->group(function () {
    Route::get('/', [HomeController::class, 'dashboardMahasiswa'])->name('dashboard.mahasiswa');

    // SETTING PROFILE
    Route::get('/profile', [HomeController::class, 'indexProfileMahasiswa'])->name('profile.mahasiswa');
    Route::get('/profile/edit', [HomeController::class, 'editProfileMahasiswa'])->name('editProfile.mahasiswa');
    Route::put('/profile', [HomeController::class, 'updateProfileMahasiswa'])->name('updateProfile.mahasiswa');

    // JADWAL
    Route::get('/jadwal', [HomeController::class, 'jadwalMahasiswa'])->name('jadwal.mahasiswa');
    Route::get('/jadwal/pdf', [HomeController::class, 'jadwalMahasiswaPDF'])->name('jadwalPDF.mahasiswa');
    
    // KRS
    Route::resource('/krs', KrsController::class);
    Route::get('/krs/pdf', [HomeController::class, 'krsPDF'])->name('krsPDF.mahasiswa');
    
    // KHS
    Route::get('/khs', [HomeController::class, 'khs'])->name('khs');
    Route::get('/nilai/KHS-NFComputer', [NilaiController::class, 'KHS_NFComputer'])->name('KHS-NFComputer');

});

//================= DOSEN =================
Route::middleware('auth:dosen')->prefix('dashboard/dosen')->group(function () {
    Route::get('/', [HomeController::class, 'dashboardDosen'])->name('dashboard.dosen');
    
    // SETTING PROFILE
    Route::get('/profile', [HomeController::class, 'indexProfileDosen'])->name('profile.dosen');
    Route::get('/profile/edit', [HomeController::class, 'editProfileDosen'])->name('editProfile.dosen');
    Route::put('/profile', [HomeController::class, 'updateProfileDosen'])->name('updateProfile.dosen');

    // JADWAL
    Route::get('/jadwal', [HomeController::class, 'jadwalDosen'])->name('jadwal.dosen');
    Route::get('/jadwal/pdf', [HomeController::class, 'jadwalDosenPDF'])->name('jadwalPDF.dosen');
    
    // NILAI
    Route::resource('/nilai', NilaiController::class);
    Route::get('/list-nilai-Mahasiswa', [NilaiController::class, 'listNilai'])->name('nilai.listNilai');

});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'firstlogin'])->name('login');
Route::post('/lastlogin', [AuthController::class, 'lastlogin'])->name('lastlogin');
Route::post('/', [AuthController::class, 'logout'])->name('logout');
