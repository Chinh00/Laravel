<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function sendMail(Request $request){
        Mail::to($request->email)->send(new SendMail());
        dd("Mail send successfully");
    }
}
