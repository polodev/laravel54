<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
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
    public function store(RegistrationForm $form) {
         $form->persist();
        return redirect('/');
    }
}
