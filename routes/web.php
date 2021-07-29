<?php

use App\Http\Controllers\LogInController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;

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
    return view('welcome');
});

// GET route

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::get('/login', [LogInController::class, 'index']);

// POST route

Route::post('/register', [SignUpController::class, 'storeRecord'])->name('store');