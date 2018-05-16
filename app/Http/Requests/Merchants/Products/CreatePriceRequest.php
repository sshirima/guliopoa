<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 11:14 PM
 */

namespace App\Http\Requests\Merchants\Products;

use App\Models\PriceDecision;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('merchant')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Product::COLUMN_PRICE_DECISION_ID => 'required|min:1',
            'normal_price' => 'required|min:1',
            'offer_price' => 'required|min:1',
        ];
    }

}