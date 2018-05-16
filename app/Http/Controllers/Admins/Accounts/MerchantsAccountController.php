<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins\Accounts;


use App\Http\Controllers\Admins\BaseController;
use App\Models\Merchant;
use App\Models\Seller;
use App\Repositories\Admins\MerchantRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class MerchantsAccountController extends BaseController
{
    protected $merchantRepo;

    /**
     * MerchantsAccountController constructor.
     * @param MerchantRepository $subCategoryRepository
     */
    public function __construct(MerchantRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->merchantRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.accounts.merchants.index')->with(['table'=>$this->getMerchantAccountTable($request)]);
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getMerchantAccountTable(Request $request){

        $this->merchantRepo->initializeTable($request,
            [Merchant::ID.' as '.'id',Merchant::COLUMN_FIRST_NAME,Merchant::COLUMN_LAST_NAME,
                Merchant::COLUMN_EMAIL,Merchant::UPDATED_TIME.' as '.Merchant::UPDATED_TIME,
                Merchant::COLUMN_PHONE_NUMBER,Seller::SELLER_NAME.' as '.Seller::SELLER_NAME]);

        $table = $this->merchantRepo->instantiateTableList();

        $table = $this->merchantRepo->setCustomTable($table);

        $this->setMerchantAccountsColumns($table);

        return $table;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setMerchantAccountsColumns($table):void
    {
        $table->addColumn(Merchant::COLUMN_FIRST_NAME)->setTitle(__('admin_page_accounts.table_head_first_name'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();

        $table->addColumn((Merchant::COLUMN_LAST_NAME))->setTitle(__('admin_page_accounts.table_head_last_name'))
            ->isSortable()->isSearchable();

        $table->addColumn((Merchant::COLUMN_EMAIL))->setTitle(__('admin_page_accounts.table_head_email'))
            ->isSortable()->isSearchable();

        $table->addColumn((Merchant::COLUMN_PHONE_NUMBER))->setTitle(__('admin_page_accounts.table_head_phone_number'))
            ->isSortable()->isSearchable();

        $table->addColumn((Seller::COLUMN_SELLER_NAME))->setTitle(__('admin_page_accounts_merchants.table_head_merchant_group_name'))
            ->setCustomTable(Seller::TABLE)->isSortable()->isSearchable()
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Seller::SELLER_NAME];
            });

        $table->addColumn((Merchant::UPDATED_AT))->setTitle(__('admin_page_accounts.table_head_updated_at'))
            ->isCustomHtmlElement(function ($entity, $column) {
                return $entity[Merchant::UPDATED_TIME];
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