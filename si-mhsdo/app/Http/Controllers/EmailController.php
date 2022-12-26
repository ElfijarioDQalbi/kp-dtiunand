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
    
    // public function kirim(){
    //     // $data =[
    //     //     'mahasiswa' => $this->Mahasiswa->allData(),];
    //     Mail::to('ayaris2110@gmail.com')->send(new Email);
    //     // return view ('/emails/email', $data);
    //     return new Email();
    // }
    
    // public function attach($email){
    //     Mail::to($email)->send(new EmailAtach);
    //     return new Email();
    // }

    // public function perulangan(){
    //     $data =[
    //         'mahasiswa' => $this->Mahasiswa->allData(),];
    //     foreach ($data as $mahasiswa) {
    //         Mail::to($mahasiswa->email)->send(new Email);
    //     }
    //     return new Email();
    // }
    public function __construct(){
        $this->Mahasiswa = new Mahasiswa();
    }

    public function create()
    {
        return view('email');
    }
    
    // public function index()
    // {
    //     $mahasiswa =DB::select('select * from mahasiswa');

    //     foreach ($mahasiswa as $email) {
          
    //     }


    // }


    public function sendEmail(Request $request)
    {
      $mahasiswa =DB::select('select * from mahasiswa');

        $request->validate([
          // 'email' => 'required|email',
          //'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

       foreach ($mahasiswa as $email) {
        $data = [
          'subject' => "gini dulu, nanti diubah",
          'name' => $request->name,
          'email' => $email->email,
          'content' => $request->content
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });
      }
        return back()->with(['message' => 'Email successfully sent!']);
    }



}
