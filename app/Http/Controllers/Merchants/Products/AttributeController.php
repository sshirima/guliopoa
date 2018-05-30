<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/16/2018
 * Time: 12:44 PM
 */

namespace App\Http\Controllers\Merchants\Products;


use App\Http\Controllers\Merchants\BaseController;
use App\Http\Requests\Merchants\Products\CreatePropertiesRequest;
use App\Repositories\Admins\PriceDecisionRepository;
use App\Repositories\Admins\ProductAttributesRepository;
use App\Repositories\Merchants\ProductRepository;
use Illuminate\Http\Request;

class AttributeController extends BaseController
{
    protected $productRepo;
    protected $priceDecisionRepo;
    protected $productAttributeRepo;


    public function __construct(ProductRepository $productRepository, PriceDecisionRepository $priceDecisionRepository, ProductAttributesRepository $repository)
    {
        parent::__construct();
        $this->productRepo = $productRepository;
        $this->priceDecisionRepo = $priceDecisionRepository;
        $this->productAttributeRepo = $repository;
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function show(Request $request, $id){
        $product = $this->productRepo->getProductById($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        return view('merchants.pages.products.options.attributes')->with(['product'=>$product,
            'priceDecisions'=>$this->priceDecisionRepo->getPriceDecisionArray(),'attributes'=>ProductAttributesRepository::getAttributeArray()]);
    }

    /**
     * @param CreatePropertiesRequest $request
     * @param $id
     * @return array
     */
    public function store(CreatePropertiesRequest $request, $id){
        $attributes = $this->productAttributeRepo->updateAttributes($request,$id);

        $this->createFlashResponse($attributes,null,__('merchant_page_products.retrieve_fail'));

        return redirect(route('merchant.products.attributes', $id));
    }

}