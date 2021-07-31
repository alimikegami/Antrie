<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LogInController extends Controller {
    public function index() {
        return view('login', ['title' => "Log In"]);
    }

    public function signIn(Request $request) {
        $email = $request->emailLogin;
        $pwd = $request->pwdLogin;
        
        $pengguna = Pengguna::where('email', '=', $email)->first();
        if (!$pengguna) {
            $request->session()->flash('status', 'account not found');
            return redirect('login');
        }

        if (Hash::check($pwd, $pengguna->password)) {
            $request->session()->put('ID_pengguna', $pengguna->ID_pengguna);
            $request->session()->put('email_pengguna', $pengguna->email);
            $request->session()->put('nama', $pengguna->nama);
            return redirect('beranda');
        } else {
            $request->session()->flash('status', 'wrong email/password');
            return redirect('login');
        }

    }
}

?>