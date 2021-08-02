<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignUpEmail($name, $email, $verification_code) {
        $data = ["name" => $name, "email" => $email, "verification_code"=>$verification_code];
        Mail::to($email)->send(new SignUpEmail($data));
    }
}
