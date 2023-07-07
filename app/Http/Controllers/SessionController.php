<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        // validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // authenticate and log in user based on provided credentials
        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');
        }

        // redirect with success message
        return back()
        ->withInput()
        ->withErrors(['email' => 'Your details could not be verified']);
        // different way of doing this
        // throw ValidationException::withMessages([
        //     'email' => 'Your details could not be verified'
        // ]);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'goodbye');
    }
}
