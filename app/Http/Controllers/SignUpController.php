<?php
namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;

class SignUpController extends Controller {
    public function index() {
        return view('signup', ["title" => "Sign Up"]);
    }

    public function signUp(Request $request) {
        if($request->inputPassword == $request->inputKonfirmasiPassword) {
            $authentication_code = sha1(time());
            $email = $request->inputEmail;
            Pengguna::create([
                "nama" => $request->inputNama,
                "email" => $email,
                "password" => Hash::make($request->inputPassword),
                "verification_code" => $authentication_code
            ]);
            MailController::sendSignUpEmail($request->inputNama, $email, $authentication_code);
            $request->session()->flash('alert-success', 'Your account has been created. Please check your email to verify your account!');
            return redirect('signup');
        }
        $request->session()->flash('alert-danger', 'Please make sure your password is the same!');
        return redirect('signup');
    }

    public function verify(Request $request){
        $auth_code = \Illuminate\Support\Facades\Request::get('code');
        $user = Pengguna::where(['verification_code' => $auth_code])->first();
        if($user != null) {
            $user->email_verified_at = \Carbon\Carbon::now()->toDateTimeString();
            $user->save();
            return redirect('login');
        }
    }
}

?>