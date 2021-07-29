<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class LogInController extends Controller {
    public function index() {
        return view('login', ['title' => "Log In"]);
    }
}

?>