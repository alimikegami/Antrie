<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller {
    public function index() {
        if (session()->has('ID_pengguna')) {
            return redirect()->route('beranda');
        } else {
            return view('login', [
                'title' => "Login"
            ]);
        }
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        $remember_me = $request->has('remember_me')? true:false;

        if (Auth::attempt($credentials, $remember_me)){
            $request->session()->regenerate();
            $user = Pengguna::where(["email" => $credentials['email']])->first();
            Auth::login($user, $remember_me);
            return redirect()->intended('beranda');
        }

        return back()->with(['failed_login' => 'Email/password is incorrect!',]);
    }

    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}

?>