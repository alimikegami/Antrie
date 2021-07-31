<?php
namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller {
    public function index() {
        return view('signup', ["title" => "Sign Up"]);
    }

    public function signUp(Request $request) {
        if($request->inputPassword == $request->inputKonfirmasiPassword) {
            Pengguna::create([
                "name" => $request->inputNama,
                "email" => $request->inputEmail,
                "password" => Hash::make($request->inputPassword)   
            ]);
            return redirect('login');
        }
        
        return redirect('signup');
        
    }
}

?>