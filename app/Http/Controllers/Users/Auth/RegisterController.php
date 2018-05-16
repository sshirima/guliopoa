<?php

namespace App\Http\Controllers\Users\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            User::COLUMN_FIRST_NAME => 'required|string|max:255',
            User::COLUMN_LAST_NAME => 'required|string|max:255',
            User::COLUMN_EMAIL => 'required|string|email|max:255|unique:'.User::TABLE,
            User::COLUMN_PASSWORD => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            User::COLUMN_FIRST_NAME => $data[User::COLUMN_FIRST_NAME],
            User::COLUMN_LAST_NAME => $data[User::COLUMN_LAST_NAME],
            User::COLUMN_EMAIL => $data[User::COLUMN_EMAIL],
            User::COLUMN_PHONE_NUMBER => $data[User::COLUMN_PHONE_NUMBER],
            User::COLUMN_PASSWORD => Hash::make($data[User::COLUMN_PASSWORD]),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('merchants.pages.auth.register');
    }
}
