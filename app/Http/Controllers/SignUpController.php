<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function index()
    {
        return view('signup', ["title" => "Sign Up"]);
    }

    public function signUp(Request $request)
    {
        $credentials = $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns|unique:pengguna,email',
            'password' => 'required|min:5|confirmed'
        ]);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['verification_code'] = sha1(time());
        $credentials['email_verified'] = false;
        Pengguna::create($credentials);
        MailController::sendEmail($credentials['nama'], $credentials['email'], $credentials['verification_code'], null);
        $request->session()->flash('alert-success', 'Your account has been created. Please check your email to verify your account!');
        return redirect('signup');
    }

    public function verify($code)
    {
        $user = Pengguna::where(['verification_code' => $code])->first();
        if ($user != null) {
            $user->email_verified = true;
            $user->save();
            return redirect('login');
        }
    }
}
