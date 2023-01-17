<?php

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [MahasiswaController::class, 'dashboard'])->name('beranda-dashboard')->middleware(('auth'));

// Route::get('/laporan', function () {
//     return view('admin/laporan');
// });
// Route::get('/akun', function () {
//     return view('admin/akun');
// });
// Route::get('/createadmin', function () {
//     return view('admin/tambahadmin');
// });

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('indexmahasiswa')->middleware(('auth'));
Route::get('/createmhs', [MahasiswaController::class, 'create'])->name('createmhs')->middleware(('auth'));
Route::post('/insertmhs', [MahasiswaController::class, 'store'])->name('insertmhs')->middleware(('auth'));
Route::get('/editmhs_{id}', [MahasiswaController::class, 'edit'])->name('editmhs')->middleware(('auth'));
Route::post('/updatemhs_{id}', [MahasiswaController::class, 'update'])->name('updatemhs')->middleware(('auth'));
Route::get('/detailmhs_{id}', [MahasiswaController::class, 'show'])->name('detailmhs')->middleware(('auth'));
Route::get('/deletemhs_{id}', [MahasiswaController::class, 'destroy'])->name('deletemhs')->middleware(('auth'));

Route::get('/exportexcel', [MahasiswaController::class, 'export'])->name('exportmhs')->middleware(('auth'));
Route::post('/importexcel', [MahasiswaController::class, 'import'])->name('importmhs')->middleware(('auth'));
Route::get('/exportexcelselected', [MahasiswaController::class, 'exportselected'])->name('exportmhsselected')->middleware(('auth'));

Route::get('/pesan', [FormController::class, 'index'])->name('indexpesanwa')->middleware(('auth'));
Route::post('/kirimpesan', [FormController::class, 'store'])->name('kirimpesan')->middleware(('auth'));
Route::get('/exportpesan', [FormController::class, 'export'])->name('exportpesan')->middleware(('auth'));
Route::get('/riwayatwa', [FormController::class, 'infoRiwayat'])->name('riwayat.wa')->middleware(('auth'));

Route::get('/email', [EmailController::class, 'index'])->name('indexemail')->middleware(('auth'));
Route::post('/email', [EmailController::class, 'sendEmail'])->name('send.email')->middleware(('auth'));

Route::get('/login', [AuthController::class, 'loginakun'])->name('login');
Route::get('/register', [AuthController::class, 'registerakun'])->name('register')->middleware(('auth'));
Route::post('/registeruser', [AuthController::class, 'registerprocess'])->name('registeruser')->middleware(('auth'));
Route::post('/loginuser', [AuthController::class, 'loginprocess'])->name('loginuser');
Route::get('/logout', [AuthController::class, 'logoutakun'])->name('logout')->middleware(('auth'));
Route::get('/register', [AuthController::class, 'indexaccount'])->name('indexadmin')->middleware(('auth'));
Route::get('/deleteadm_{id}', [AuthController::class, 'deleteaccount'])->name('deleteadmin')->middleware(('auth'));
