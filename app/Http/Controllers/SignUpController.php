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
        Pengguna::create($credentials);
        MailController::sendSignUpEmail($credentials['nama'], $credentials['email'], $credentials['verification_code']);
        $request->session()->flash('alert-success', 'Your account has been created. Please check your email to verify your account!');
        return redirect('signup');
    }

    public function verify($code)
    {
        $user = Pengguna::where(['verification_code' => $code])->first();
        if ($user != null) {
            $user->email_verified_at = \Carbon\Carbon::now()->toDateTimeString();
            $user->save();
            return redirect('login');
        }
    }
}
