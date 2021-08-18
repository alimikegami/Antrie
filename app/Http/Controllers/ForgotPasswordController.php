<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\PasswordResets;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordPage(){
        return view('forgotPassword', ["title" => "Forgot Password"]);
    }

    public function showChangePasswordForm(){
        return view('setNewPassword', ["title" => "Set New Password"]);
    }

    public function sendResetToken(Request $request){
        $token = sha1(time());
        $email = $request->emailResetPassword;
        $find_account = Pengguna::where('email', '=', $email)
                                    ->first();
        PasswordResets::create([
            'email' => $email,
            'token' => $token,
        ]);
        $pengguna = Pengguna::where('email', '=', $email)
                    ->first();
        MailController::sendPasswordResetEmail($pengguna->nama, $email, $token);
        $request->session()->flash('alert-success', 'Please check your email to reset your password!');
        return redirect()->route('forgotPassword');
    }

    public function resetPassword($token){
        $record = PasswordResets::where('token', '=', $token)
                        ->first();
        if ($record){
            
            $token_creation_time = Carbon::parse($record->created_at);
            $reset_time = Carbon::now();
            $diff = $reset_time->diffInSeconds($token_creation_time);
            
            // Waktu akan reset password lebih dari satu jam
            if ($diff > 3600){
                dd('masuk');
            }

            $pengguna = Pengguna::where('email', '=', $record->email)
                                    ->first();
            session()->put('id_change_pass', $pengguna->id);
            
            return redirect()->route('setNewPassword');
        }
    }

    public function changePassword(Request $request){
        if ($request->newPasswordReset === $request->confirmPasswordReset) {
            // dd(session()->get('id_change_pass'));
            $affected_row = Pengguna::where('id', '=', session()->get('id_change_pass'))
                            ->update(['password' => Hash::make($request->confirmPasswordReset)]);
            session()->forget('ID_akun');
            dd($affected_row);
            // return redirect()->route('');
        }
    }
}
