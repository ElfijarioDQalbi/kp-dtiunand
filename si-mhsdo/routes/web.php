<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MahasiswaController;

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
    return view('admin/beranda');
});
Route::get('/laporan', function () {
    return view('admin/laporan');
});
Route::get('/akun', function () {
    return view('admin/akun');
});
Route::get('/createadmin', function () {
    return view('admin/tambahadmin');
});

// Route::resource('mhs', MahasiswaController::class);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('indexmahasiswa');
Route::get('/createmhs',[MahasiswaController::class, 'create'])->name('createmhs');
Route::post('/insertmhs',[MahasiswaController::class, 'store'])->name('insertmhs');
Route::get('/editmhs_{id}',[MahasiswaController::class, 'edit'])->name('editmhs');
Route::post('/updatemhs_{id}',[MahasiswaController::class, 'update'])->name('updatemhs');
Route::get('/detailmhs_{id}',[MahasiswaController::class, 'show'])->name('detailmhs');
Route::get('/deletemhs_{id}',[MahasiswaController::class, 'destroy'])->name('deletemhs');

Route::get('/exportexcel',[MahasiswaController::class, 'export'])->name('exportmhs');
Route::post('/importexcel',[MahasiswaController::class, 'import'])->name('importmhs');

Route::get('/pesan', [FormController::class, 'index'])->name('indexpesanwa'); 
Route::post('/kirimpesan', [FormController::class, 'store'])->name('kirimpesan'); 
Route::get('/exportpesan',[FormController::class, 'export'])->name('exportpesan');

Route::get('/email', [EmailController::class , 'create']);
Route::post('/email', [EmailController::class , 'sendEmail'])->name('send.email');