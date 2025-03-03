
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| Otevřené routy bez nutnosti přihlášení
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'authenticate']);


/*
|--------------------------------------------------------------------------
| Routy po přihlášení uživatele
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/transactions/{transactions}', [TransactionController::class, 'transaction'])->name('transaction');
    Route::post('/form_input', [TransactionController::class, 'storeIncome'])->name('income.store');
    Route::get('/form_input', [TransactionController::class, 'showIncomeForm'])->name('income.form');


    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});


