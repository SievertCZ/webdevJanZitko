<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        return view('budgets'); // Očekává šablonu resources/views/budgets/index.blade.php
    }

    public function store(Request $request)
    {
        // Logika pro přidání nového rozpočtu
        return redirect()->back()->with('success', 'Rozpočet byl úspěšně uložen.');
    }
}
