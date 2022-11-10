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

Route::get('/administrator', function () {
    return view('admin.index');
})->name('administrator');

Route::get('/administrator/tahun-akademik', function () {
    return view('admin.tahun.index');
});

Route::get('/administrator/dosen', function () {
    return view('admin.dosen.index');
});

Route::get('/administrator/mahasiswa', function () {
    return view('admin.mahasiswa.index');
});
