<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 3/12/2018
 * Time: 12:57 AM
 */

namespace App\Http\Controllers\Merchants;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class BaseController extends Controller
{
    /**
     * Default constructor for merchant access panel calls
     *
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:merchant');
    }

    /**
     * @param $model
     * @param $successMsg
     * @param $errorMessage
     */
    public function createFlashResponse($model,$successMsg,$errorMessage): void
    {
        if (empty($model)  || $model==false) {
            if(isset($errorMessage)){
                Flash::error($errorMessage);
            }
        } else{
            if(isset($successMsg)){
                Flash::success($successMsg);
            }
        }
    }
}