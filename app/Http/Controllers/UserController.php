<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'email|required',
            'password' => 'required'
        ]);

        $cre = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($cre)) {
            session()->flash('success', 'Welcome ' . Auth::user()->name);
            return redirect()->route('Dashboard');
        } else {
            session()->flash('error', 'Sorry! Try Again. It seems your login credential is not correct.');
            return redirect()->back();
        }
    }

    public function forget(){
        return view('auth.forget');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
