<?php

namespace App\Http\Controllers;

use App\Models\PasswordResets;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordPage(){
        return view('forgotPassword', ["title" => "Forgot Password"]);
    }

    public function createResetToken(Request $request){
        $token = sha1(time());
        $email = $request->emailResetPassword;
        PasswordResets::create([
            'email' => $email,
            'token' => $token,
        ]);
        // MailController::sendPasswordResetEmail($request->inputNama, $email, $authentication_code);
    }
}
