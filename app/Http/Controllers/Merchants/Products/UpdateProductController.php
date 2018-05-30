<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/17/2018
 * Time: 10:06 PM
 */

namespace App\Http\Controllers\Merchants\Products;


use App\Http\Controllers\Merchants\BaseController;
use App\Http\Requests\Merchants\Products\UpdateProductImagesRequest;
use App\Models\Product;
use App\Repositories\Merchants\ProductRepository;
use App\Services\Merchants\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;
use Response;

class UpdateProductController extends BaseController
{
    protected $productRepo;

    protected $rule_update_title =
        [
            Product::COLUMN_PRODUCT_NAME => 'required|min:2|max:255',
            /*'content' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'*/
        ];

    protected $rule_update_description =
        [
            Product::COLUMN_PRODUCT_DESCRIPTION => 'required|min:2',
        ];

    protected $rule_delete_image =
        [
            'image_name' => 'required',
        ];

    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepo = $productRepository;
    }

    public function updateTitle(Request $request, $id){

        $validator = Validator::make(Input::all(), $this->rule_update_title);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $product = $this->productRepo->findWithoutFail($id);
            $product[Product::COLUMN_PRODUCT_NAME] = $request[Product::COLUMN_PRODUCT_NAME];
            $product->update();
            return response()->json($product);
        }
    }

    public function updateDescription(Request $request, $id){

        $validator = Validator::make(Input::all(), $this->rule_update_description);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $product = $this->productRepo->findWithoutFail($id);
            $product[Product::COLUMN_PRODUCT_DESCRIPTION] = $request[Product::COLUMN_PRODUCT_DESCRIPTION];
            $product->update();
            return response()->json($product);
        }
    }

    public function deleteImage(Request $request, $id){
        $validator = Validator::make(Input::all(), $this->rule_delete_image);

        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            //Delete image
            $status = $this->productRepo->deleteProductImage($request['image_name']);

            return response()->json($status);
        }
    }

    public function updateImages(UpdateProductImagesRequest $request, $id){
        //return $request->all();
        $product = $this->productRepo->findWithoutFail($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        $saved = $this->productRepo->storeProductImages($request, $product);

        if($saved){
            $this->createFlashResponse($product,__('merchant_page_products.update_image_success'),
                __('merchant_page_products.retrieve_fail'));
        }
        return redirect(route('merchant.products.edit', $id));
    }

}