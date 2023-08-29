<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;

class ContactController extends Controller
{

    public function index () {

        $data['set']=Setting::select('email','phone')->first();
        return view('web.contact.index')->with($data);
    }


    public function send (Request $req){

    $validator= Validator::make($req->all(),
     [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'body' =>    'required|string',
         
     ]);
    // $req->validate([
    //     'name' => 'required|string|max:255',
    //     //     'email' => 'required|email|max:255',
    //     //     'subject' => 'nullable|string|max:255',
    //     //     'body' =>    'required|string',
    // ])

     if($validator->fails())
     {
        $errors =$validator->errors();
        return redirect(url('contact'))->withErrors($errors);
     }

     Message::create([
        'name'=>$req->name,
        'email'=>$req->email,
        'subject'=>$req->subject,
        'body'=>$req->body,
     ]);
     $req-> session::flash('success','your message sent successfuly');

     return back();
    }

}
