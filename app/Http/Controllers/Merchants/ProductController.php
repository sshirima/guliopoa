<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Requests\Merchants\Products\CreateProductRequest;
use App\Http\Requests\Merchants\Products\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductSubcategory;
use App\Models\Seller;
use App\Repositories\Merchants\ProductRepository;
use App\Services\Merchants\ImageManager;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductController extends BaseController
{
    protected $productRepo;


    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->productRepo = $productRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        if($request['viewType'] == 'Grid'){
            $table = $this->getMerchantProducts($request);
        }else{
            $table = $this->getProductsTable($request);
        }

        return view('merchants.pages.products.index')->with(['table'=>$table,
            'viewType'=>$request['viewType']]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request){
        $type = $request['type'];
        return view('merchants.pages.products.create')
            ->with(['type'=>$type,
                'productTypes'=>$this->productRepo->getProductTypeSelectArray(),
                'subCategories'=>$this->productRepo->getCategoriesSelectArray()]);
    }


    /**
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request){

        $product = $this->productRepo->createProduct($request)->all();

        $this->createFlashResponse($product,__('merchant_page_products.create_success'),__('merchant_page_products.create_fail'));

        return redirect()->route('merchant.products.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function edit(Request $request, $id){

        $product = $this->productRepo->getProductById($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        return view('merchants.pages.products.create')->with([
            'product'=>$product,'subCategories'=>$this->productRepo->getCategoriesSelectArray()]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function show(Request $request, $id){

        $product = $this->productRepo->getProductById($id);

        $this->createFlashResponse($product,null,__('merchant_page_products.retrieve_fail'));

        return view('merchants.pages.products.options.show')->with(['product'=>$product]);
    }



    /**
     * @param UpdateProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id){

        $product = $this->productRepo->update($request->all(),$id);

        $this->createFlashResponse($product,__('merchant_page_products.update_success'),__('merchant_page_products.update_fail'));

        return redirect()->route('admin.products.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->productRepo->deleteProduct($id)){
            Flash::success(__('merchant_page_products.destroy_success'));
            return redirect()->route('admin.sellers.index');
        } else {
            Flash::error(__('merchant_page_products.destroy_fail'));
            return redirect()->route('admin.sellers.index');
        }
    }

    private function getMerchantProducts(Request $request){
        return $this->productRepo->getProductsByMerchants($request);
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getProductsTable(Request $request){

        $this->productRepo->initializeTable($request, [Product::ID.' as '.'id',Product::PRODUCT_NAME.' as '.Product::PRODUCT_NAME,
            Product::PRODUCT_DESCRIPTION.' as '.Product::PRODUCT_DESCRIPTION,Seller::SELLER_NAME.' as '.Seller::SELLER_NAME,
            Product::COLUMN_EXPIRE_DATE,Product::IS_ACTIVE.' as '.Product::IS_ACTIVE,Product::COLUMN_OFFER_PRICE,Product::COLUMN_NORMAL_PRICE]);

        $table = $this->productRepo->instantiateTableList();

        $table = $this->productRepo->setCustomTable($table);

        $this->setSellerTableColumns($table);

        return $table;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setSellerTableColumns($table):void
    {
        $table->addColumn(Product::COLUMN_PRODUCT_NAME)->setTitle(__('merchant_page_products.table_head_product_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation()
            ->isCustomHtmlElement(function ($entity, $column) {
                return Product::getExcerpt($entity[Product::PRODUCT_NAME]);
            });
        $table->addColumn(Product::COLUMN_PRODUCT_DESCRIPTION)->setTitle(__('merchant_page_products.table_head_product_description'))
            ->isSortable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return Product::getExcerpt($entity[Product::PRODUCT_DESCRIPTION],3,100);
            });
        $table->addColumn(Product::COLUMN_NORMAL_PRICE)->setTitle(__('merchant_page_products.table_head_product_normal_price'))
            ->isSortable();
        $table->addColumn(Product::COLUMN_OFFER_PRICE)->setTitle(__('merchant_page_products.table_head_product_offer_price'))
            ->isSortable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return ($entity[Product::COLUMN_NORMAL_PRICE]-$entity[Product::COLUMN_OFFER_PRICE])/$entity[Product::COLUMN_NORMAL_PRICE]*100 .'%';
            });
        $table->addColumn()->setTitle(__('merchant_page_products.table_head_product_seller_name'))
            ->isSortable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Seller::SELLER_NAME];
            });
        $table->addColumn(Product::COLUMN_EXPIRE_DATE)->setTitle(__('merchant_page_products.table_head_product_expiry_date'))
            ->isSortable();

        $table->addColumn(Product::COLUMN_IS_ACTIVE)->setTitle(__('merchant_page_products.table_head_product_status'))
            ->isSortable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Product::IS_ACTIVE]?'<span class="badge bg-green">Active</span>':'<span class="badge bg-red">Inactive</span>';
            });
    }
}
