<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AntreankuController;
use App\Http\Controllers\ForgotPasswordController;

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
Route::get('/aturLoket', function () {
    return view('aturLoket', [
        'title' => 'test'
    ]);
})->name('landingpage');

// GET route

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::get('/login', [LogInController::class, 'index'])->name('login');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/verify/{code}', [SignUpController::class, 'verify'])->name('verify');
Route::get('/konfirmasi-antrean/{nama_antrean}/loket/{loket:slug}/ambil-nomor', [AntreanController::class, 'ambilAntrean'])->name('ambil-antrean');
Route::get('/buat-antrean', [AntreanController::class, 'formPembuatanAntrean'])->name('buat-antrean');
Route::get('/antrean/{antrean:slug}', [AntreanController::class, 'show']);
Route::get('/beranda/{kategori:slug}', [BerandaController::class, 'showAntreanBasedOnCategories']);
Route::get('/logout', [LogInController::class, 'logout'])->name('logout');
Route::get('/antreanku', [AntreankuController::class, 'showAntreanku'])->name('antreanku');
Route::get('/antreanku/antrean/{slug}/loket/{loket:slug}', [AntreankuController::class, 'showKonfigurasiLoket'])->name('konfigurasiAntrean');
Route::get('/ambil-antrean-baru/{id}', [AntreanController::class, 'ambilAntreanBerikutnya'])->name('ambil-antrean-baru');
Route::get('/hitung-antrean-di-belakang', [AntreanController::class, 'autoUpdateJumlahAntrean']);
Route::get('/password-reset/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordPage'])->name('forgotPassword');
Route::get('/set-new-password', [ForgotPasswordController::class, 'showChangePasswordForm'])->name('setNewPassword');
Route::get('/antreanku/{antrean:slug}', [AntreankuController::class, 'aturLoket']);
// POST route

Route::post('/register', [SignUpController::class, 'signUp'])->name('store');
Route::post('/signin', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/buat-record-antrean', [AntreanController::class, 'buatRecordAntrean'])->name('buat-record-antrean');
Route::post('/submit-antrean-offline', [AntreanController::class, 'submitAntreanOffline']);
Route::post('/send-password-reset-link', [ForgotPasswordController::class, 'sendResetToken'])->name('sendPasswordResetLink');

// PUT route
Route::put('/perbaharui-antrean', [AntreanController::class, 'majukanAntrean'])->name('perbaharui.antrean');
Route::put('update-password', [ForgotPasswordController::class, 'changePassword'])->name('updatePassword');
Route::put('/buka-loket', [AntreanController::class, 'bukaLoket'])->name('bukaLoket');
Route::put('/tutup-loket', [AntreanController::class, 'tutupLoket'])->name('tutupLoket');


