<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins;


use App\Http\Requests\Admins\CreateCategoryRequest;
use App\Http\Requests\Admins\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Admins\CategoryRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends BaseController
{
    protected $categoryRepo;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $subCategoryRepository
     */
    public function __construct(CategoryRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->categoryRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.categories.index')->with(['table'=>$this->getCategoriesTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.categories.create');
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request){

        $category = $this->categoryRepo->create($request->all());

        $this->createFlashResponse($category,__('admin_page_categories.create_success'),__('admin_page_categories.create_fail'));

        return redirect()->route('admin.categories.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $category = $this->categoryRepo->findWithoutFail($id);

        $this->createFlashResponse($category,null,__('admin_page_categories.retrieve_fail'));

        return view('admins.pages.categories.edit')->with(['category'=>$category]);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, $id){

        $admin = $this->categoryRepo->update($request->all(),$id);

        $this->createFlashResponse($admin,__('admin_page_categories.update_success'),__('admin_page_categories.update_fail'));

        return redirect()->route('admin.categories.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->categoryRepo->deleteCategory($id)){
            Flash::success(__('admin_page_categories.destroy_success'));
            return redirect()->route('admin.categories.index');
        } else {
            Flash::error(__('admin_page_categories.destroy_fail'));
            return redirect()->route('admin.categories.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getCategoriesTable(Request $request){

        //$this->categoryRepo->initializeTable($request, [Category::COLUMN_ID,Category::COLUMN_NAME]);

        $categoryTable = $this->categoryRepo->instantiateTableList();

        $categoryTable->setRowsNumber(20);

        $this->setCategoryTableColumns($categoryTable);

        return $categoryTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setCategoryTableColumns($table):void
    {
        $table->addColumn(Category::COLUMN_NAME)->setTitle(__('admin_page_categories.table_head_category_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();
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