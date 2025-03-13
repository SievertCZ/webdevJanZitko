<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index()
    {
        return view('analysis'); // Očekává šablonu resources/views/analysis/index.blade.php
    }
}
