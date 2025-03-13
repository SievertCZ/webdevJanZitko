<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\SupportController;

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

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/income', [TransactionController::class, 'storeIncome'])->name('income.store');


    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
    Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');

    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');

    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis.index');

    Route::get('/import-export', [ImportExportController::class, 'index'])->name('import-export.index');
    Route::post('/import', [ImportExportController::class, 'import'])->name('import');
    Route::get('/export', [ImportExportController::class, 'export'])->name('export');

    Route::get('/support', [SupportController::class, 'index'])->name('support.index');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
