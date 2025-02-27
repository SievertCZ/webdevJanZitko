<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Zobrazí registrační stránku.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Zobrazí přihlašovací stránku.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Zpracuje registraci nového uživatele.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'min:5'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ], [
            'name.required'   => 'Jméno je povinné pole',
            'name.min'        => 'Jméno musí mít alespoň 5 znaků',
            'email.required'  => 'Email je povinné pole',
            'email.email'     => 'Email musí být ve správném formátu',
            'email.unique'    => 'Tento email je již registrován',
            'password.required' => 'Heslo je povinné pole',
            'password.min'    => 'Heslo musí mít alespoň 8 znaků',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/register')->with('message', 'Registrace proběhla v pořádku');
    }

    /**
     * Zpracuje pokus o autentizaci uživatele.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Vložil jste špatný email nebo heslo',
        ])->onlyInput('email');
    }
}
