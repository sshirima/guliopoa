<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\UpdateSubCategoryRequest;
use App\Http\Requests\SubCategories\CreateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Admins\SubCategoryRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class SubCategoryController extends BaseController
{
    protected $subCategoryRepo;

    /**
     * SubCategoryController constructor.
     * @param SubCategoryRepository $subCategoryRepository
     */
    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->subCategoryRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.sub_categories.index')->with(['table'=>$this->getSubCategoriesTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.sub_categories.create');
    }

    /**
     * @param CreateSubCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSubCategoryRequest $request){

        $category = $this->subCategoryRepo->create($request->all());

        $this->createFlashResponse($category,__('admin_page_sub_categories.create_success'),__('admin_page_sub_categories.create_fail'));

        return redirect()->route('admin.sub_categories.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $subCategory = $this->subCategoryRepo->findWithoutFail($id);

        $this->createFlashResponse($subCategory,null,__('admin_page_sub_categories.retrieve_fail'));

        return view('admins.pages.sub_categories.edit')->with(['category'=>$subCategory]);
    }

   
    public function update(UpdateSubCategoryRequest $request, $id){

        $admin = $this->subCategoryRepo->update($request->all(),$id);

        $this->createFlashResponse($admin,__('admin_page_sub_categories.update_success'),__('admin_page_sub_categories.update_fail'));

        return redirect()->route('admin.sub_categories.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->subCategoryRepo->deleteCategory($id)){
            Flash::success(__('admin_page_sub_categories.destroy_success'));
            return redirect()->route('admin.sub_categories.index');
        } else {
            Flash::error(__('admin_page_sub_categories.destroy_fail'));
            return redirect()->route('admin.sub_categories.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getSubCategoriesTable(Request $request){

        $this->subCategoryRepo->initializeTable($request, [SubCategory::ID.' as '.'id',
            SubCategory::COLUMN_NAME,Category::NAME.' as '.Category::NAME]);

        $categoryTable = $this->subCategoryRepo->instantiateTableList();

        $categoryTable = $this->subCategoryRepo->setCustomTable($categoryTable);

        $categoryTable->setRowsNumber(20);

        $this->setSubCategoryTableColumns($categoryTable);

        return $categoryTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setSubCategoryTableColumns($table):void
    {
        $table->addColumn(SubCategory::COLUMN_NAME)->setTitle(__('admin_page_sub_categories.table_head_sub_category_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();
        $table->addColumn(Category::COLUMN_NAME)->setTitle(__('admin_page_sub_categories.table_head_belongs_to'))
            ->isSortable()->isSearchable()->setCustomTable(Category::TABLE)
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Category::NAME];
            });
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
