<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/16/2018
 * Time: 12:43 PM
 */

namespace App\Http\Controllers\Merchants\Products;


use App\Http\Controllers\Merchants\BaseController;
use App\Http\Requests\Merchants\Products\CreatePriceRequest;
use App\Models\ProductAttribute;
use App\Repositories\Admins\PriceDecisionRepository;
use App\Repositories\Merchants\ProductRepository;
use Illuminate\Http\Request;

class CostController extends BaseController
{

    protected $productRepo;
    protected $priceDecisionRepo;


    public function __construct(ProductRepository $productRepository, PriceDecisionRepository $priceDecisionRepository)
    {
        parent::__construct();
        $this->productRepo = $productRepository;
        $this->priceDecisionRepo = $priceDecisionRepository;
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function show(Request $request, $id){
        $product = $this->productRepo->getProductById($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        return view('merchants.pages.products.options.costs')->with(['product'=>$product,
            'priceDecisions'=>$this->priceDecisionRepo->getPriceDecisionArray()]);
    }

    /**
     * @param CreatePriceRequest $request
     * @param $id
     * @return bool
     */
    public function store(CreatePriceRequest $request, $id){

        $this->createFlashResponse($this->priceDecisionRepo->assignPriceDecision($request, $id),__('merchant_page_products.price_cost_assign_success'),
            __('merchant_page_products.price_cost_assign_fail'));

        return redirect(route('merchant.products.costs',$id));
    }
}