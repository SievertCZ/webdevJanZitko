<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showIncomeForm()
    {
        $accounts = Account::where('user_id', Auth::id())->get();

        return view('form.form_input', compact('accounts'));
    }

    public function storeIncome(Request $request)
    {
        // Validace vstupů
        $validated = $request->validate([
            'dateIncome' => 'required|date',
            'amountIncome' => 'required|numeric|min:0.01',
            'currencyIncome' => 'required|string',
            'accountIncome' => 'required|integer|exists:accounts,id',
            'noteIncome' => 'nullable|string',
        ]);

        // Uložení transakce
        Transaction::create([
            'transaction_date' => $validated['dateIncome'],
            'category_id' => 1, // Přednastavené ID kategorie (můžeš dynamizovat)
            'amount' => $validated['amountIncome'],
            'account_id' => $validated['accountIncome'],
            'note' => $validated['noteIncome'],
            'inserted_by' => auth()->user()->name ?? 'Neznámý uživatel',
            'inserted_at' => now(),
            'transaction_type' => 'income',
            'icon' => null, // Pokud máš ikonu
        ]);

        return redirect()->back()->with('success', 'Příjem byl úspěšně uložen!');
    }
}
