<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('layouts.session.sign-up');
    }

    public function store(Request $request)
    {
        $credentials = request()->validate ([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);   

        $credentials['password'] = Hash::make($credentials['password']);
    
        $request->session()->flash('success', 'Your account has been created.');
        $user = User::create($credentials);
        Auth::login($user); 
        return redirect('/dashboard');
    }
}
