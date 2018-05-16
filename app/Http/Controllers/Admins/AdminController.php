<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 8:05 PM
 */

namespace App\Http\Controllers\Admins;


class AdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard(){
        return view('admins.pages.dashboard');
    }
}