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
    return view('welcome');
});
Route::get('/mahasiswa', function () {
    return view('admin/mahasiswa');
});
Route::get('/beranda', function () {
    return view('admin/beranda');
});
Route::get('/laporan', function () {
    return view('admin/laporan');
});
Route::get('/akun', function () {
    return view('admin/akun');
});
Route::get('/tambah', function () {
    return view('admin/tambahmahasiswa');
});

