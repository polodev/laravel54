<?php

namespace App\Http\Requests;

use App\Mail\WelcomeAgain;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
    public function persist() {
        //create a user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        //send mail to the user
        //\Mail::to($user)->send(new WelcomeAgain($user));

        //login to the account
        auth()->login($user);
    }
}
