<?php

namespace App\Http\Controllers\Admins\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\LoginRequest;
use App\Models\Admin;
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
    protected $redirectTo = '/admin';

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
        $this->middleware('guest:admin', ['except' => ['logout']]);
        $this->guard = 'admin';
    }

    public function showLoginForm()
    {
        return view('admins.pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if ($this->isAuthenticated($request)) {
            //If successful then redirect to their intended location
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only(Admin::COLUMN_EMAIL, Admin::COLUMN_REMEMBER_TOKEN));
    }

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
