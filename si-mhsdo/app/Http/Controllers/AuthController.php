<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginakun(){
        return view('layouts.login');
    }

    public function registerakun(){
        return view ('admin.akun');
    }

    public function registerprocess(Request $request){
        // dd($request->all());
        try{
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            ]);
            return redirect ('/register')
            ->with('success-register','Anda Berhasil Melakukan Account Register');
        }catch(Throwable $e){
            return redirect('/register')
            ->with('gagal-register', 'Anda Gagal melakukan Register, Akun Sudah Terdaftar Sebelumnya');
        }
    
    }

    public function loginprocess(Request $request){
        if(Auth::attempt($request->only('name','password'))){
            return redirect ('/');
        }else{
            return redirect('/login')->with('gagal-login','Anda Gagal Login');
        }
        
    }

    public function logoutakun(){
        Auth::logout();
        return redirect ('/login');
    }

    public function deleteaccount(User $admin, $id){
        $admin = User::findOrfail($id);
        $admin->delete();
        return redirect('/register')->with('success-hapus', 'Data Berhasil Dihapuskan');
    }

    public function indexaccount(){
        $admin = User::all();
        return view('admin.akun', compact('admin'));
    }
}
