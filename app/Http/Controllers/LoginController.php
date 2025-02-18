<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function create()
    {
        return view('auth.login');
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('articles/user_index');
        } 
        
        return back()->withErrors([
            'email' => 'Incorrect email or password',
        ])->onlyInput('email');
 
        
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}