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

    public function create()
    {
      // $data =[
      //   'mahasiswa' => $this->Mahasiswa->allData(),];
      $mhs = Mahasiswa::all();
      return view('/admin/email', compact('mhs'));
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
