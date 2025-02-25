<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Zde můžete registrovat webové routy pro vaši aplikaci.
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/transactions', function () {
    return view('transactions');
})->name('transactions');

// Routa pro přihlašovací formulář
Route::get('/login', function () {
    return view('login');
})->name('login');

// Routa pro registrační stránku
Route::get('/register', function () {
    return view('register');
})->name('register');

// Routa pro registrační stránku
Route::post('/register', [AuthController::class, 'register'] )->name('register');

// Volitelná routa pro zapomenuté heslo
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

// Routa pro odhlášení uživatele (tlačítko Odhlásit se ve vašem headeru)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
