<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins\Accounts;


use App\Http\Controllers\Admins\BaseController;
use App\Http\Requests\Admins\CreateAdminAccountRequest;
use App\Http\Requests\Admins\UpdateAdminAccountRequest;
use App\Models\Admin;
use App\Repositories\Admins\AdminRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class AdminsAccountController extends BaseController
{
    protected $adminRepo;

    /**
     * AdminsAccountController constructor.
     * @param AdminRepository $subCategoryRepository
     */
    public function __construct(AdminRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->adminRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.accounts.admin.index')->with(['table'=>$this->getAdminAccountTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.accounts.admin.create');
    }

    /**
     * @param CreateAdminAccountRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAdminAccountRequest $request){

        $admin = $this->adminRepo->create($request->all());

        $this->createFlashResponse($admin,__('admin_page_accounts.account_create_success'),__('admin_page_accounts.account_create_fail'));

        return redirect()->route('admin.admin_accounts.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $admin = $this->adminRepo->findWithoutFail($id);

        $this->createFlashResponse($admin,null,__('admin_page_accounts.account_retrieve_fail'));

        return view('admins.pages.accounts.admin.edit')->with(['adminAccount'=>$admin]);
    }

    /**
     * @param UpdateAdminAccountRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminAccountRequest $request, $id){

        $admin = $this->adminRepo->update($request->all(),$id);

        $this->createFlashResponse($admin,__('admin_page_accounts.account_update_success'),__('admin_page_accounts.account_update_fail'));

        return redirect()->route('admin.admin_accounts.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->adminRepo->deleteAccount($id)){
            Flash::success(__('admin_page_accounts.account_destroy_success'));
            return redirect()->route('admin.admin_accounts.index');
        } else {
            Flash::error(__('admin_page_accounts.account_destroy_fail'));
            return redirect()->route('admin.admin_accounts.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getAdminAccountTable(Request $request){

        /*$this->adminRepo->initializeTable($request,
            [Admin::COLUMN_ID,Admin::COLUMN_FIRST_NAME,Admin::COLUMN_LAST_NAME, Admin::COLUMN_EMAIL,Admin::UPDATED_AT,Admin::COLUMN_PHONE_NUMBER]);*/

        $adminTable = $this->adminRepo->instantiateTableList();

        $this->setAdminAccountsColumns($adminTable);

        return $adminTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setAdminAccountsColumns($table):void
    {
        $table->addColumn(Admin::COLUMN_FIRST_NAME)->setTitle(__('admin_page_accounts.table_head_first_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();

        $table->addColumn((Admin::COLUMN_LAST_NAME))->setTitle(__('admin_page_accounts.table_head_last_name'))
            ->isSortable()->isSearchable();

        $table->addColumn((Admin::COLUMN_EMAIL))->setTitle(__('admin_page_accounts.table_head_email'))
            ->isSortable()->isSearchable();

        $table->addColumn((Admin::COLUMN_PHONE_NUMBER))->setTitle(__('admin_page_accounts.table_head_phone_number'))
            ->isSortable()->isSearchable();

        $table->addColumn((Admin::UPDATED_AT))->setTitle(__('admin_page_accounts.table_head_updated_at'))
            ->isSortable();
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