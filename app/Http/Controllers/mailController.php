<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public function index()
    {
    	return view('mail');
    }

    public function post(Request $req )
    {
    	$req->validate([
    		'email'=>'required',
    		'subject'=>'required',
    		'message'=>'required',
    	]);

    	$data = [
    		'email'=>$req->email,
    		'subject'=>$req->subject,
    		'bodyMessage'=>$req->message,
    	];
    	
    	Mail::send('mail.mail', $data, function ($message) use ($data){
    		$message->from('bachrisaiful6@gmail.com','Saepul');
    		$message->to($data['email']);
    		$message->subject($data['subject']);
    	
    	});

    	return redirect()->back();
    }
}
