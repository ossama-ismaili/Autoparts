<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }
    public function send(Request $request)
    {
        $email=$request->form_email;
        $name=$request->form_name;
        $subject=$request->form_subject;
        $message=$request->form_message;
        Mail::to('contact@autoparts.com')->send(new ContactMail($email, $name, $subject, $message));
        return back();
    }
}
