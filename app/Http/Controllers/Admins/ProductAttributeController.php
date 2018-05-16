<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\ProductAttributes\CreateProductAttributeRequest;
use App\Http\Requests\Admins\ProductAttributes\UpdateProductAttributeRequest;
use App\Models\ProductAttribute;
use App\Repositories\Admins\ProductAttributesRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductAttributeController extends BaseController
{
    protected $productAttributeRepo;

    /**
     * ProductAttributeController constructor.
     * @param ProductAttributesRepository $subCategoryRepository
     */
    public function __construct(ProductAttributesRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->productAttributeRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.product_attributes.index')->with(['table'=>$this->getProductAttributeTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.product_attributes.create')->with(['attributeTypes'=>$this->productAttributeRepo->getTypeSelectArray()]);
    }

    /**
     * @param CreateProductAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductAttributeRequest $request){

        $productAttribute = $this->productAttributeRepo->create($request->all());

        $this->createFlashResponse($productAttribute,__('admin_page_product_attributes.create_success'),__('admin_page_product_attributes.create_fail'));

        return redirect()->route('admin.product_attributes.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $productAttribute = $this->productAttributeRepo->findWithoutFail($id);

        $this->createFlashResponse($productAttribute,null,__('admin_page_product_attributes.retrieve_fail'));

        return view('admins.pages.product_attributes.edit')->with(['productAttribute'=>$productAttribute,'attributeTypes'=>$this->productAttributeRepo->getTypeSelectArray()]);
    }

    /**
     * @param UpdateProductAttributeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductAttributeRequest $request, $id){

        $productAttribute = $this->productAttributeRepo->update($request->all(),$id);

        $this->createFlashResponse($productAttribute,__('admin_page_product_attributes.update_success'),__('admin_page_product_attributes.update_fail'));

        return redirect()->route('admin.product_attributes.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->productAttributeRepo->deleteProductAttribute($id)){
            Flash::success(__('admin_page_product_attributes.destroy_success'));
            return redirect()->route('admin.product_attributes.index');
        } else {
            Flash::error(__('admin_page_product_attributes.destroy_fail'));
            return redirect()->route('admin.product_attributes.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getProductAttributeTable(Request $request){

        /*$this->productAttributeRepo->initializeTable($request, [ProductAttribute::COLUMN_ID,ProductAttribute::COLUMN_ATTRIBUTE_CODE,
            ProductAttribute::COLUMN_DESCRIPTION,ProductAttribute::COLUMN_TYPE,ProductAttribute::COLUMN_ATTRIBUTE_NAME]);*/

        $table = $this->productAttributeRepo->instantiateTableList();

        $this->setProductAttributesTableColumns($table);

        return $table;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setProductAttributesTableColumns($table):void
    {
        $table->addColumn(ProductAttribute::COLUMN_ATTRIBUTE_CODE)->setTitle(__('admin_page_product_attributes.table_head_attribute_code'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();
        $table->addColumn(ProductAttribute::COLUMN_ATTRIBUTE_NAME)->setTitle(__('admin_page_product_attributes.table_head_attribute_name'))
            ->isSortable()->isSearchable();
        $table->addColumn(ProductAttribute::COLUMN_DESCRIPTION)->setTitle(__('admin_page_product_attributes.table_head_attribute_description'))
            ->isSortable();
        $table->addColumn(ProductAttribute::COLUMN_TYPE)->setTitle(__('admin_page_product_attributes.table_head_attribute_type'))
            ->isSortable()->isSearchable();
    }

    /**
     * @param $model
     * @param $successMsg
     * @param $errorMessage
     */
    private function createFlashResponse($model,$successMsg,$errorMessage): void
    {
        if (empty($model)) {
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