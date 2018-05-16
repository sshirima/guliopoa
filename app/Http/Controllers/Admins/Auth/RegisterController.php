<?php

namespace App\Http\Controllers\Admins\Auth;

use App\Models\Admin;
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
        $this->middleware('guest:admin');
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
            Admin::COLUMN_FIRST_NAME => 'required|string|max:255',
            Admin::COLUMN_LAST_NAME => 'required|string|max:255',
            Admin::COLUMN_EMAIL => 'required|string|email|max:255|unique:'.Admin::TABLE,
            Admin::COLUMN_PASSWORD => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            Admin::COLUMN_FIRST_NAME => $data[Admin::COLUMN_FIRST_NAME],
            Admin::COLUMN_LAST_NAME => $data[Admin::COLUMN_LAST_NAME],
            Admin::COLUMN_EMAIL => $data[Admin::COLUMN_EMAIL],
            Admin::COLUMN_PHONE_NUMBER => $data[Admin::COLUMN_PHONE_NUMBER],
            Admin::COLUMN_PASSWORD => Hash::make($data[Admin::COLUMN_PASSWORD]),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admins.pages.auth.register');
    }
}
