<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function showIncomeForm()
    {
        $accounts = Account::where('user_id', auth()->id())->get();
        $categories = Category::all();

        return view('form.form_input', compact('accounts', 'categories'));
    }


    public function storeIncome(Request $request)
    {
        // Ověř, zda je uživatel přihlášen
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Musíte být přihlášen pro přidání transakce.');
        }

        // Validace vstupů
        $validated = $request->validate([
            'dateIncome' => 'required|date',
            'amountIncome' => 'required|numeric|min:0.01',
            'accountIncome' => 'required|integer|exists:accounts,id',
            'category_id' => 'required|integer|exists:categories,id',
            'noteIncome' => 'nullable|string',
        ]);

        // Uložení transakce
        Transaction::create([
            'transaction_date' => $validated['dateIncome'],
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'amount' => $validated['amountIncome'],
            'account_id' => $validated['accountIncome'],
            'note' => $validated['noteIncome'] ?? null,
            'transaction_type' => 'income',
        ]);

        return redirect()->back()->with('success', 'Příjem byl úspěšně uložen!');
    }

}
