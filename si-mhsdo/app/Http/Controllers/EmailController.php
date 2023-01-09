<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Mail\EmailAtach;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    // public function __construct(){
    //     $this->Mahasiswa = new Mahasiswa();
    // }

    public function index(Request $request)
    {
      $mhs = Mahasiswa::query();
        //filter angkatan
        $mhs->when($request->aktn, function ($query) use ($request) {
            return $query->where('angkatan', 'like', '%' . $request->aktn . '%');
        });
        //filter semester
        $mhs->when($request->smester, function ($query) use ($request) {
            return $query->whereSemester($request->smester);
        });
        //filter fakultas
        $mhs->when($request->fkltas, function ($query) use ($request) {
            return $query->whereFakultas($request->fkltas);
        });
        return view('admin.email', ['mhs' => $mhs->paginate(5)]);

      // $mhs = Mahasiswa::all();
      // return view('/admin/email', compact('mhs'));
    }
    
    public function sendEmail(Request $request)
    {
      $mahasiswa =DB::select('select * from mahasiswas');

        $request->validate([
          // 'email' => 'required|email',
          //'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

       foreach ($mahasiswa as $email) {
        $mhs = [
          'subject' => "Peringatan Mahasiswa DO ",
          'name' => $request->name,
          'email' => $email->email,
          'content' => $request->content
        ];

        Mail::send('email-template', $mhs, function($message) use ($mhs) {
          $message->to($mhs['email'])
          ->subject($mhs['subject']);
        });
      }
        return back()->with(['message' => 'Email successfully sent!']);
    }



}
