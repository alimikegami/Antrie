<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\BerandaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingPage');
})->name('landingpage');

// GET route

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::get('/login', [LogInController::class, 'index'])->name('login');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/verify', [SignUpController::class, 'verify'])->name('verify');
Route::get('/buat-antrean', [AntreanController::class, 'formPembuatanAntrean'])->name('buat-antrean');
Route::get('/antrean/{antrean:slug}', [AntreanController::class, 'show']);

// POST route

Route::post('/register', [SignUpController::class, 'signUp'])->name('store');
Route::post('/signin', [LoginController::class, 'signIn'])->name('signin');
Route::post('/buat-record-antrean', [AntreanController::class, 'buatRecordAntrean'])->name('buat-record-antrean');