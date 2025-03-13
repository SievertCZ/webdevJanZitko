<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        // Získání přihlášeného uživatele
        $user = Auth::user();

        // Načtení účtů přihlášeného uživatele
        $accounts = Account::where('user_id', $user->id)->get();

        // Získání ID všech účtů uživatele
        $accountIds = $accounts->pluck('id');

        // Načtení všech příjmů z těchto účtů
        $incomeTransactions = Transaction::whereIn('account_id', $accountIds)
            ->where('transaction_type', 'income')
            ->orderBy('transaction_date', 'desc')
            ->get();

        // Načítání kategorií pouze pro transakce typu "income"
        $categoriesIncomeTransactions = Category::where('type', 'income')->get();

        // Předání dat do view
        return view('dashboard', [
            'accounts' => $accounts,
            'incomeTransactions' => $incomeTransactions,
            'categoriesIncomeTransactions' => $categoriesIncomeTransactions,
        ]);
    }
}
