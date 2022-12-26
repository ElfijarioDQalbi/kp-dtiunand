<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\EmailController;

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
Route::get('/pesan', function () {
    return view('admin/pesan');
});
Route::get('/createmahasiswa', function () {
    return view('admin/tambahmahasiswa');
});
Route::get('/createadmin', function () {
    return view('admin/tambahadmin');
});


Route::get('/pesan', [FormController::class, 'index']);
Route::post('/pesan', [FormController::class, 'store']);

Route::get('/email', [EmailController::class , 'create']);
Route::post('/email', [EmailController::class , 'sendEmail'])->name('send.email');