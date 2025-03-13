<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
    }

    public function store(Request $request)
    {
        // Zde bude logika pro provedení převodu
        return redirect()->back()->with('success', 'Převod byl úspěšně proveden.');
    }
}
