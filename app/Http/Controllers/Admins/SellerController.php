<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\Sellers\CreateSellerRequest;
use App\Http\Requests\Admins\Sellers\UpdateSellerRequest;
use App\Models\Seller;
use App\Models\SellerGroup;
use App\Repositories\Admins\SellerRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class SellerController extends BaseController
{
    protected $sellerRepo;

    /**
     * SellerController constructor.
     * @param SellerRepository $subCategoryRepository
     */
    public function __construct(SellerRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->sellerRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.sellers.index')->with(['table'=>$this->getSellersTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.sellers.create')->with(['sellerGroupsArray'=>$this->sellerRepo->getSellerGroupsArray()]);
    }

    /**
     * @param CreateSellerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateSellerRequest $request){

        $seller = $this->sellerRepo->create($request->all());

        $this->createFlashResponse($seller,__('admin_page_sellers.create_success'),__('admin_page_sellers.create_fail'));

        return redirect()->route('admin.sellers.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $seller = $this->sellerRepo->findWithoutFail($id);

        $this->createFlashResponse($seller,null,__('admin_page_sellers.retrieve_fail'));

        return view('admins.pages.sellers.edit')->with(['seller'=>$seller,'sellerGroupsArray'=>$this->sellerRepo->getSellerGroupsArray()]);
    }

    /**
     * @param UpdateSellerRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSellerRequest $request, $id){

        $location = $this->sellerRepo->update($request->all(),$id);

        $this->createFlashResponse($location,__('admin_page_sellers.update_success'),__('admin_page_sellers.update_fail'));

        return redirect()->route('admin.sellers.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->sellerRepo->deleteSeller($id)){
            Flash::success(__('admin_page_sellers.destroy_success'));
            return redirect()->route('admin.sellers.index');
        } else {
            Flash::error(__('admin_page_sellers.destroy_fail'));
            return redirect()->route('admin.sellers.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getSellersTable(Request $request){

        $this->sellerRepo->initializeTable($request, [Seller::ID.' as '.'id',Seller::SELLER_NAME.' as '.Seller::SELLER_NAME,
            Seller::DESCRIPTION.' as '.Seller::DESCRIPTION,SellerGroup::GROUP_NAME.' as '.SellerGroup::GROUP_NAME]);

        $table = $this->sellerRepo->instantiateTableList();

        $table = $this->sellerRepo->setCustomTable($table);

        $this->setSellerTableColumns($table);

        return $table;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setSellerTableColumns($table):void
    {
        $table->addColumn(Seller::COLUMN_SELLER_NAME)->setTitle(__('admin_page_sellers.table_head_seller_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Seller::SELLER_NAME];
            });
        $table->addColumn(Seller::COLUMN_DESCRIPTION)->setTitle(__('admin_page_sellers.table_head_seller_description'))
            ->isSortable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Seller::DESCRIPTION];
            });
        $table->addColumn(SellerGroup::COLUMN_GROUP_NAME)->setTitle(__('admin_page_sellers.table_head_seller_group_name'))->setCustomTable(SellerGroup::TABLE)
            ->isSortable()->isSearchable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[SellerGroup::GROUP_NAME];
            });
    }

    /**
     * @param $model
     * @param $successMsg
     * @param $errorMessage
     */
    private function createFlashResponse($model,$successMsg,$errorMessage): void
    {
        if (empty($model)  || $model==false) {
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