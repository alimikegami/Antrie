<?php

namespace App\Http\Controllers;

use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use App\Jobs\SendSignUpEmail;
use App\Jobs\SendForgotPasswordEmail;
use App\Jobs\SendQueueAlert;
use App\Mail\PasswordResetEmail;
use App\Mail\QueueAlertEmail;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class MailController extends Controller
{
    public static function sendSignUpEmail($name, $email, $verification_code) {
        // To switch back into the slower sending method, use only $data and mail to line
        $data = ["name" => $name, "email" => $email, "verification_code"=>$verification_code];
        $job = (new SendSignUpEmail($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job)->onQueue('send_signup_email');
        
        // Mail::to($email)->send(new SignUpEmail($data));
    }

    public static function sendPasswordResetEmail($name, $email, $token) {
        $data = ["name" => $name, "email" => $email, "token" => $token];
        $job = (new SendForgotPasswordEmail($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job)->onQueue('send_password_reset_email');        
    }

    public static function sendQueueAlertEmail($name, $email) {
        $data = ["name" => $name, "email" => $email];
        $job = (new SendQueueAlert($data))->delay(Carbon::now()->addSeconds(5));
        dispatch($job)->onQueue('send_queue_alert_email');
    }
}
