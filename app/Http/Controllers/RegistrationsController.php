<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        //send mail to the user
        \Mail::to($user)->send(new WelcomeAgain($user));

        //login to the account
        auth()->login($user);
        return redirect('/');
    }
}
