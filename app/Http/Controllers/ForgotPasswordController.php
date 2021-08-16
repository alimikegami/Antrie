<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\PasswordResets;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordPage(){
        return view('forgotPassword', ["title" => "Forgot Password"]);
    }

    public function sendResetToken(Request $request){
        $token = sha1(time());
        $email = $request->emailResetPassword;
        PasswordResets::create([
            'email' => $email,
            'token' => $token,
        ]);
        $pengguna = Pengguna::where('email', '=', $email)
                    ->first();
        MailController::sendPasswordResetEmail($pengguna->nama, $email, $token);
    }

    public function resetPassword($token){
        $record = PasswordResets::where('token', '=', $token)
                        ->first();
        $token_creation_time = Carbon::parse($record->created_at);
        $reset_time = Carbon::now();
        $diff = $reset_time->diffInSeconds($token_creation_time);

        // Waktu akan reset password lebih dari satu jam
        if ($diff > 3600){

        }
    }
}
