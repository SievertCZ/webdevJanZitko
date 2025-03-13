<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function index()
    {
        return view('import_export'); // Očekává šablonu resources/views/import_export/index.blade.php
    }

    public function import(Request $request)
    {
        // Logika pro import dat
        return redirect()->back()->with('success', 'Data byla úspěšně importována.');
    }

    public function export()
    {
        // Logika pro export dat
        return response()->json(['message' => 'Export proběhl úspěšně.']);
    }
}
