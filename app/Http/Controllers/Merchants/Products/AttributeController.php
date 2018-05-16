<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/16/2018
 * Time: 12:44 PM
 */

namespace App\Http\Controllers\Merchants\Products;


use App\Http\Controllers\Merchants\BaseController;
use App\Repositories\Merchants\ProductRepository;
use Illuminate\Http\Request;

class AttributeController extends BaseController
{
    protected $productRepo;


    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepo = $productRepository;
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function show(Request $request, $id){
        $product = $this->productRepo->findWithoutFail($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        return view('merchants.pages.products.options.attributes')->with(['product'=>$product]);
    }

}