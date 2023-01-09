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
  public function __construct()
  {
    //$this->Mahasiswa = new Mahasiswa();
  }

  public function create()
  {
    $data = mahasiswa::all();
    return view('/admin/email', compact('data'));
  }

  public function sendEmail(Request $request)
  {
    $mahasiswa = DB::select('select * from mahasiswas');

    $request->validate([
      // 'email' => 'required|email',
      //'subject' => 'required',
      'name' => 'required',
      'content' => 'required',
    ]);

    foreach ($mahasiswa as $email) {
      $data = [
        'subject' => "Peringatan Mahasiswa DO ",
        'name' => $email->name,
        'email' => $email->email,
        'content' => $request->content
      ];


      Mail::send('email-template', $data, function ($message) use ($data) {
        $message->to($data['email'])
          ->subject($data['subject']);
      });
    }
    var_dump($data);
    return back()->with(['message' => 'Email successfully sent!']);
  }
}
