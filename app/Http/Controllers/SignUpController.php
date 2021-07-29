<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class SignUpController extends Controller {
    public function index() {
        return view('signup', ["title" => "Sign Up"]);
    }
}

?>