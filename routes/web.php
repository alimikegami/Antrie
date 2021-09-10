<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AntreankuController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RiwayatAntreanController;
use App\Models\RiwayatAntrean;

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
    return view('landingPage', [
        'kategori' => Kategori::all()
    ]);
})->name('landingpage');

Route::get('/riwayat', function () {
    return view('riwayatAntrean', [
        'title' => 'test'
    ]);
});

Route::get('/riwayat-antrean', [RiwayatAntreanController::class, 'show']);

// GET route

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::get('/login', [LogInController::class, 'index'])->name('login')->middleware('guest');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/verify/{code}', [SignUpController::class, 'verify'])->name('verify');
Route::get('/konfirmasi-antrean/{nama_antrean}/loket/{loket:slug}/ambil-nomor', [AntreanController::class, 'ambilAntrean'])->name('ambil-antrean');
Route::get('/buat-antrean', [AntreanController::class, 'formPembuatanAntrean'])->name('buat-antrean');
Route::get('/antrean/{antrean:slug}', [AntreanController::class, 'show']);
Route::get('/beranda/{kategori:slug}', [BerandaController::class, 'showAntreanBasedOnCategories']);
Route::get('/search', [BerandaController::class, 'showSearchResult'])->name('search');
Route::get('/antreanku', [AntreankuController::class, 'showAntreanku'])->name('antreanku');
Route::get('/antreanku/antrean/{slug}/loket/{loket:slug}', [AntreankuController::class, 'showKonfigurasiLoket'])->name('konfigurasiAntrean');
Route::get('/ambil-antrean-baru/{id}', [AntreanController::class, 'ambilAntreanBerikutnya'])->name('ambil-antrean-baru');
Route::get('/hitung-antrean-di-belakang', [AntreanController::class, 'autoUpdateJumlahAntrean']);
Route::get('/password-reset/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordPage'])->name('forgotPassword')->middleware('guest');
Route::get('/set-new-password', [ForgotPasswordController::class, 'showChangePasswordForm'])->name('setNewPassword')->middleware('guest');
Route::get('/antreanku/{antrean:slug}', [AntreankuController::class, 'aturLoket']);
Route::get('/riwayat-antrean', [RiwayatAntreanController::class, 'show'])->name('riwayat-antrean');
Route::get('/ubah-data-antrean/{antrean:slug}', [AntreankuController::class, 'editAntrean'])->name('formEditAntrean');

// POST route

Route::post('/register', [SignUpController::class, 'signUp'])->name('store');
Route::post('/signin', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/buat-record-antrean', [AntreanController::class, 'buatRecordAntrean'])->name('buat-record-antrean');
Route::post('/submit-antrean-offline', [AntreanController::class, 'submitAntreanOffline']);
Route::get('/logout', [LogInController::class, 'logout'])->name('logout');
Route::post('/send-password-reset-link', [ForgotPasswordController::class, 'sendResetToken'])->name('sendPasswordResetLink');

// PUT route
Route::put('/perbaharui-antrean', [AntreankuController::class, 'perbaharuiAntrean']);
Route::put('update-password', [ForgotPasswordController::class, 'changePassword'])->name('updatePassword');
Route::put('/buka-loket', [AntreanController::class, 'bukaLoket'])->name('bukaLoket');
Route::put('/tutup-loket', [AntreanController::class, 'tutupLoket'])->name('tutupLoket');
Route::put('/batalkan-antrean', [RiwayatAntreanController::class, 'batalkanAntrean']);
