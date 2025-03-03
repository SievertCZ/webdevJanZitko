<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
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

        return view('dashboard', [
            'accounts' => $accounts,
            'incomeTransactions' => $incomeTransactions,
        ]);
    }
}
