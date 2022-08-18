<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //

    public function login()
    {
        return view('login.login');
    }

    public function validate_login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }else{
            return back()->with('error',' Wrong credentials..!');
        }

    }





    public function do_logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
