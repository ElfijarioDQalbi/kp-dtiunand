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

Route::get('/', function () {
    $jlhmhs_smstr3 = Mahasiswa::where('semester','3')->count();
    $jlhmhs_smstr13 = Mahasiswa::where('semester','13')->count();
    return view('admin/beranda', compact('jlhmhs_smstr3','jlhmhs_smstr13'));
});
// Route::get('/laporan', function () {
//     return view('admin/laporan');
// });
// Route::get('/akun', function () {
//     return view('admin/akun');
// });
// Route::get('/createadmin', function () {
//     return view('admin/tambahadmin');
// });

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('indexmahasiswa');
Route::get('/createmhs', [MahasiswaController::class, 'create'])->name('createmhs');
Route::post('/insertmhs', [MahasiswaController::class, 'store'])->name('insertmhs');
Route::get('/editmhs_{id}', [MahasiswaController::class, 'edit'])->name('editmhs');
Route::post('/updatemhs_{id}', [MahasiswaController::class, 'update'])->name('updatemhs');
Route::get('/detailmhs_{id}', [MahasiswaController::class, 'show'])->name('detailmhs');
Route::get('/deletemhs_{id}', [MahasiswaController::class, 'destroy'])->name('deletemhs');

Route::get('/exportexcel', [MahasiswaController::class, 'export'])->name('exportmhs');
Route::post('/importexcel', [MahasiswaController::class, 'import'])->name('importmhs');
Route::get('/exportexcelselected', [MahasiswaController::class, 'exportselected'])->name('exportmhsselected');

Route::get('/pesan', [FormController::class, 'index'])->name('indexpesanwa');
Route::post('/kirimpesan', [FormController::class, 'store'])->name('kirimpesan');
Route::get('/exportpesan', [FormController::class, 'export'])->name('exportpesan');
Route::get('/riwayatwa', [FormController::class, 'infoRiwayat'])->name('riwayat.wa');

Route::get('/email', [EmailController::class, 'index'])->name('indexemail');
Route::post('/email', [EmailController::class, 'sendEmail'])->name('send.email');

Route::get('/login', [AuthController::class, 'loginakun'])->name('login');
Route::get('/register', [AuthController::class, 'registerakun'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registerprocess'])->name('registeruser');
Route::post('/loginuser', [AuthController::class, 'loginprocess'])->name('loginuser');
Route::get('/logout', [AuthController::class, 'logoutakun'])->name('logout');

