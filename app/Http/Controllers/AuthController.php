<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin(){
        return view('login');
    }
    public function login(Request $request){
         $credentials = $request-> validate([
            'email' => ['required','email'],
            'password' =>['required ']
         ]);

         if(Auth::attempt($credentials)){
            $request -> session()->regenerate();
            return redirect()->intended('/');
         }
         return back()->withErrors([
            'email' => 'Email tidak terdaftar'
         ])->onlyInput('email');

    }
}