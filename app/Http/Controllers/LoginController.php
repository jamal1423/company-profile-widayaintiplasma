<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_admin()
    {
        return view('backend.pages.login-admin');
    }

    public function authenticate_admin(Request $request)
    {
        // dd($request->password);
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        // dd($credentials);
        
        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/panel');
            }
        }

        return back()->with('loginError', 'Wrong username or password, please try again!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/panel');
    }
}
