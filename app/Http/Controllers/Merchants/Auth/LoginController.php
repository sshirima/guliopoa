<?php

namespace App\Http\Controllers\Merchants\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\LoginRequest;
use App\Models\Admin;
use App\Models\Merchant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/merchant';

    /**
     * Guard used for authentications
     * @var string
     */
    protected $guard;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:merchant', ['except' => ['logout']]);
        $this->guard = 'merchant';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('merchants.pages.auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if ($this->isAuthenticated($request)) {
            //If successful then redirect to their intended location
            return redirect()->intended(route('merchant.home'));
        }
        return redirect()->back()->withInput($request->only(Merchant::COLUMN_EMAIL, Merchant::COLUMN_REMEMBER_TOKEN));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::guard($this->guard)->logout();
        return redirect('/');
    }

    /**
     * @param LoginRequest $request
     * @return bool
     */
    public function isAuthenticated(LoginRequest $request): bool
    {
        return Auth::guard($this->guard)->attempt([Admin::COLUMN_EMAIL => $request[Admin::COLUMN_EMAIL], Admin::COLUMN_PASSWORD => $request[Admin::COLUMN_PASSWORD]], $request[Admin::COLUMN_REMEMBER_TOKEN]);
    }
}
