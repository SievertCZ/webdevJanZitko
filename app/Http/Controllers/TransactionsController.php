<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index(Transaction $transactions)
    {
        return view('transactions', [
            'transactions' => $transactions,
        ]);
    }
}
