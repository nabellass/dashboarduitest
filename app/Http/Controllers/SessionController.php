<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.sign-in');
    }

    public function store(Request $request)
    {
        $credentials = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        }
        else{

            return back()->withErrors([
                'email'=>'Email or password invalid.'
            ])->onlyInput('email');
        }
    }
}