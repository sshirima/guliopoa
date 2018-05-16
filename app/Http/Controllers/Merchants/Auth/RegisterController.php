<?php

namespace App\Http\Controllers\Merchants\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
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
    protected $redirectTo = '/merchant';

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
            Merchant::COLUMN_FIRST_NAME => 'required|string|max:255',
            Merchant::COLUMN_LAST_NAME => 'required|string|max:255',
            Merchant::COLUMN_EMAIL => 'required|string|email|max:255|unique:'.Merchant::TABLE,
            Merchant::COLUMN_PASSWORD => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Merchant
     */
    protected function create(array $data)
    {
        return Merchant::create([
            Merchant::COLUMN_FIRST_NAME => $data[Merchant::COLUMN_FIRST_NAME],
            Merchant::COLUMN_LAST_NAME => $data[Merchant::COLUMN_LAST_NAME],
            Merchant::COLUMN_EMAIL => $data[Merchant::COLUMN_EMAIL],
            Merchant::COLUMN_PHONE_NUMBER => $data[Merchant::COLUMN_PHONE_NUMBER],
            Merchant::COLUMN_PASSWORD => Hash::make($data[Merchant::COLUMN_PASSWORD]),
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
