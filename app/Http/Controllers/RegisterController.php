<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){

        return view('register.create');
    }

    // common convention to use store
    public function store(){
        $attributes = request()-> validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users','username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        // bcrypt available out of the box
        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        // log user in
        auth()->login($user);

        // success message in session shorthand
        return redirect('/')->with('success', 'Your account has been created.');
    }

}
