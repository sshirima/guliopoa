<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 3/12/2018
 * Time: 12:57 AM
 */

namespace App\Http\Controllers\Admins;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    /**
     * Default controller for Admin panel access calls
     * BaseController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}