<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view ('layouts.register');
    }

    public function registerprocess(Request $request){
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect ('/login')->with('success-register','Anda Berhasil Melakukan Account Register');
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
}
