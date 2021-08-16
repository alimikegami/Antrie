<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
    

    public function signIn(Request $request) {
        $email = $request->emailLogin;
        $pwd = $request->pwdLogin;
        
        $pengguna = Pengguna::where('email', '=', $email)->first();
        if (!$pengguna) {
            $request->session()->flash('status', 'account not found');
            return redirect('login');
        }

        if (Hash::check($pwd, $pengguna->password) && !is_null($pengguna->email_verified_at)) {
            $request->session()->put('ID_pengguna', $pengguna->id);
            $request->session()->put('email_pengguna', $pengguna->email);
            $request->session()->put('nama', $pengguna->nama);
            return redirect('beranda');
        } else {
            $request->session()->flash('status', 'wrong email/password');
            return redirect('login');
        }

    }

    public function logout(){
        session()->flush();
        return redirect()->route('landingpage');
    }
}

?>