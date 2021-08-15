<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use App\Jobs\SendSignUpEmail;
use App\Mail\PasswordResetEmail;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class MailController extends Controller
{
    public static function sendSignUpEmail($name, $email, $verification_code) {
        $data = ["name" => $name, "email" => $email, "verification_code"=>$verification_code];
        Mail::to($email)->send(new SignUpEmail($data));
    }

    public static function sendPasswordResetEmail($name, $email, $token) {
        $data = ["name" => $name, "email" => $email, "token" => $token];
        Mail::to($email)->send(new PasswordResetEmail($data));
    }
}
