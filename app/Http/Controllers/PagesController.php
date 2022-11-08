<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Posts;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index()
    {
        $posts=Posts::orderBy('id', 'desc')->limit(8)-> get();
        return view('pages.welcome', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postcontact(Request $request)
    {
        $data=Request()->validate([
            'email'=>'required|email',
            'subject'=>'required|min:3',
            'message'=>'required|min:5'
        ]);

        $mail=array(
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodymessage'=>$request->message
        );

        Mail::send('emails.contact', $mail, function($message) use($mail){
            $message->from($mail['email']);
            $message->to('petermwendwa@gmail.com');
            $message->subject($mail['subject']);

        });

        Session::flash('Success', 'Email was sent successfully!!');
        return redirect('/');
    }
}
