<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use App\Jobs\SendSignUpEmail;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignUpEmail($name, $email, $verification_code) {
        // $data = ["name" => $name, "email" => $email, "verification_code"=>$verification_code];
        $data = ["name" => $name, "email" => $email, "verification_code"=>$verification_code];
        $job = (new SendSignUpEmail($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job)->onQueue('send_email');
        // Mail::to($email)->send(new SignUpEmail($name, $email, $verification_code));
    }
}
