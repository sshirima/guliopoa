<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\SellerGroups\CreateSellerGroupRequest;
use App\Http\Requests\Admins\SellerGroups\UpdateSellerGroupRequest;
use App\Models\SellerGroup;
use App\Repositories\Admins\SellerGroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;

class SellerGroupController extends BaseController
{
    protected $sellerGroupRepo;

    /**
     * SellerGroupController constructor.
     * @param SellerGroupRepository $subCategoryRepository
     */
    public function __construct(SellerGroupRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->sellerGroupRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.seller_groups.index')->with(['table'=>$this->getSellerGroupsTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.seller_groups.create');
    }

    /**
     * @param CreateSellerGroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSellerGroupRequest $request){

        $category = $this->sellerGroupRepo->create($request->all());

        $this->createFlashResponse($category,__('admin_page_seller_groups.create_success'),__('admin_page_seller_groups.create_fail'));

        return redirect()->route('admin.seller_groups.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $sellerGroup = $this->sellerGroupRepo->findWithoutFail($id);

        $this->createFlashResponse($sellerGroup,null,__('admin_page_seller_groups.retrieve_fail'));

        return view('admins.pages.seller_groups.edit')->with(['sellerGroup'=>$sellerGroup]);
    }


    public function update(UpdateSellerGroupRequest $request, $id){

        $admin = $this->sellerGroupRepo->update($request->all(),$id);

        $this->createFlashResponse($admin,__('admin_page_seller_groups.update_success'),__('admin_page_seller_groups.update_fail'));

        return redirect()->route('admin.seller_groups.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->sellerGroupRepo->deleteSellerGroup($id)){
            Flash::success(__('admin_page_seller_groups.destroy_success'));
            return redirect()->route('admin.seller_groups.index');
        } else {
            Flash::error(__('admin_page_seller_groups.destroy_fail'));
            return redirect()->route('admin.seller_groups.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getSellerGroupsTable(Request $request){

        $this->sellerGroupRepo->initializeTable($request, [SellerGroup::COLUMN_ID,SellerGroup::COLUMN_GROUP_NAME,SellerGroup::COLUMN_DESCRIPTION]);

        $adminTable = $this->sellerGroupRepo->instantiateTableList();

        $this->setCurrenciesTableColumns($adminTable);

        return $adminTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setCurrenciesTableColumns($table):void
    {
        $table->addColumn(SellerGroup::COLUMN_GROUP_NAME)->setTitle(__('admin_page_seller_groups.table_head_group_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();
        $table->addColumn(SellerGroup::COLUMN_DESCRIPTION)->setTitle(__('admin_page_seller_groups.table_head_group_description'));
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
