<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{

    public function signin()
    {
        return view('signin', [
            'title' => 'Sign-in'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                $request->session()->regenerate();
        
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return back()->with('error', 'Anda tidak memiliki akses.');
            }
        }
        return back()->withErrors(['email' => 'Kombinasi email dan password tidak valid.']);
    }    

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
        ]);
    }
}
