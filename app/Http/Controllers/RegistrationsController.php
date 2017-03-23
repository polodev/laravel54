<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }
    public function create() {
        return view('auth.registration.create');
    }
    public function store() {
        //validate user
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        //create a user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        //login to the account
        auth()->login($user);
        return redirect('/');
    }
}
