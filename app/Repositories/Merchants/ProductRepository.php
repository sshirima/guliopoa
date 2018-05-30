<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Merchants;

use App\Http\Requests\Merchants\Products\CreateProductRequest;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use App\Models\Seller;
use App\Models\SubCategory;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use App\Services\Merchants\ImageManager;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'merchant.products.index';
        $this->routeEdit = 'merchant.products.edit';
        $this->routeDestroy = 'merchant.products.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Product::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id){
        $product = $this->findWithoutFail($id);

        if (empty($product)){
            return false;
        }
        $product->delete();
        return true;
    }

    public function createProduct(CreateProductRequest $request)
    {
        $request = $this->prepareAttributes($request);

        $product = $this->create($request->all());

        $this->storeProductImages($request, $product);

        return $product;
    }

    public function deleteProductImage($imageName){
        $imageManager = new ImageManager();

        return $imageManager->deleteImage($imageName);
    }

    /**
     * @param CreateProductRequest $request
     * @return CreateProductRequest
     */
    private function prepareAttributes(CreateProductRequest $request)
    {
        $attributes = $request->all();

        $request[Product::COLUMN_PRODUCT_TYPE] = Product::DEFAULT_TYPES[$attributes[Product::COLUMN_PRODUCT_TYPE] - 1];

        $request[Product::COLUMN_SELLER_ID] = auth()->user()[Product::COLUMN_SELLER_ID];

        $request[Product::COLUMN_IS_ACTIVE] = 0;

        $request[Product::COLUMN_EXPIRE_DATE] = $this->formatDate($attributes, 'Y-m-d');

        return $request;
    }

    /**
     * @param $attributes
     * @param $format
     * @return mixed
     */
    private function formatDate($attributes,$format)
    {
        $date = new \DateTime($attributes[Product::COLUMN_EXPIRE_DATE]);

        return $date->format($format);
    }

    /**
     * @param Request $request
     * @param $product
     * @return bool
     */
    public function storeProductImages(Request $request, $product)
    {
        $request[ProductImage::COLUMN_PRODUCT_ID] = $product[Product::COLUMN_ID];

        return $this->saveProductsImages($request);
    }

    /**
     * @param Request $request
     * @return bool|Request
     */
    private function saveProductsImages(Request $request)
    {
        if (!$request->hasFile(Product::REL_PRODUCT_IMAGES)) {

            return false;
        } else {
            $imageManager = new ImageManager();

            $request['images'] = $imageManager->handleUploadedImages($request,Product::REL_PRODUCT_IMAGES);
        }
        return true;
    }

    /**
     * @return array
     */
    public function getProductTypeSelectArray(){
        $defaultTypes = Product::DEFAULT_TYPES;
        $types = array(__('merchant_page_products.field_input_select_type_default'));
        $i =1;
        foreach ($defaultTypes as $type){
            $types[$i] =  $type;
            $i++;
        }
        return $types;
    }

    /**
     * @return array
     */
    public function getCategoriesSelectArray(){
        $categories = SubCategory::select([SubCategory::COLUMN_ID,SubCategory::COLUMN_NAME])->get();
        $arrays = array(__('merchant_page_products.field_input_select_categories'));
        foreach ($categories as $category){
            $arrays[$category[SubCategory::COLUMN_ID]] =  $category[SubCategory::COLUMN_NAME];
        }
        return $arrays;
    }

    /**
     * @param $table
     * @return mixed
     */
    public function setCustomTable($table){

        $table->addQueryInstructions(function ($query) {
            $query->select($this->entityColumns)
                ->join(Seller::TABLE,Seller::ID,'=',Product::SELLER_ID)
                ->where($this->conditions);
        });

        return $table;
    }

    /**
     * @param $id
     * @return mixed|Model
     */
    public function getProductById($id)
    {
        return $this->with(['images','subcategories','seller','attributes','priceDecision'])->findWithoutFail($id);
    }

    public function getProductsByMerchants(Request $request){
        return Product::with(['images','seller'])->where([Product::COLUMN_SELLER_ID=>auth()->user()[Merchant::COLUMN_SELLER_ID]])->get();
    }
}