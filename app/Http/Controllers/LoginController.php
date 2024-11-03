<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // Redirect berdasarkan role
            return $this->redirectBasedOnRole(Auth::user());
        }
 
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    private function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.happyquest');
            case 'psikolog':
                return redirect()->route('psikolog.dashboard');
            default:
                return redirect()->route('user.dashboard');
        }
    }
}
