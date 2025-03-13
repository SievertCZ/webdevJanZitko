<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        return view('support'); // Očekává šablonu resources/views/support/index.blade.php
    }
}
