<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    public function create() {
        return view('auth.login.create');
    }
    public function store() {
        $email = request('email');
        $password = request('password');
        if(Auth::attempt([ 'email' => $email, 'password' => $password])) {
            return redirect()->home();
        }
        return back()->withErrors([
            'message' => 'Please check the credentials'
        ]);
    }
    public function destroy() {
        auth()->logout();
        return redirect('/');
    }
}
