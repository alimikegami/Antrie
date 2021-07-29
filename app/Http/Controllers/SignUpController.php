<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignUpController extends Controller {
    public function index() {
        return view('signup', ["title" => "Sign Up"]);
    }

    public function storeRecord(Request $request) {
        User::create([
            "name" => $request->inputNama,
            "email" => $request->inputEmail,
            "password" => $request->inputPassword   
        ]);
        
        return redirect('signup');
    }
}

?>