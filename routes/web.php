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
});

Route::get('/administrator', function () {
    return view('admin.home');
});

Route::get('/administrator/home', function () {
    return view('admin.home');
});

Route::get('/administrator/DataMaster', function () {
    return view('admin.DataMaster');
});

Route::get('/administrator/TahunAkademik', function () {
    return view('admin.TahunAkademik');
});
Route::get('/administrator/JadwalKuliah', function () {
    return view('admin.JadwalKuliah');
});
Route::get('/administrator/Dosen', function () {
    return view('admin.Dosen');
});
Route::get('/administrator/Mahasiswa', function () {
    return view('admin.Mahasiswa');
});