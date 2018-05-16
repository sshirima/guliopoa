<?php

namespace App\Http\Controllers\Admins;

use App\Http\Requests\Admins\Currencies\CreateCurrencyRequest;
use App\Http\Requests\Admins\Currencies\UpdateCurrencyRequest;
use App\Models\Currency;
use App\Repositories\Admins\CurrencyRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CurrencyController extends BaseController
{
    protected $currencyRepo;

    /**
     * CurrencyController constructor.
     * @param CurrencyRepository $subCategoryRepository
     */
    public function __construct(CurrencyRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->currencyRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.currencies.index')->with(['table'=>$this->getCurrenciesTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.currencies.create');
    }

    /**
     * @param CreateCurrencyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCurrencyRequest $request){

        $category = $this->currencyRepo->create($request->all());

        $this->createFlashResponse($category,__('admin_page_currencies.create_success'),__('admin_page_currencies.create_fail'));

        return redirect()->route('admin.currencies.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $currency = $this->currencyRepo->findWithoutFail($id);

        $this->createFlashResponse($currency,null,__('admin_page_currencies.retrieve_fail'));

        return view('admins.pages.currencies.edit')->with(['currency'=>$currency]);
    }

    
    public function update(UpdateCurrencyRequest $request, $id){

        $admin = $this->currencyRepo->update($request->all(),$id);

        $this->createFlashResponse($admin,__('admin_page_currencies.update_success'),__('admin_page_currencies.update_fail'));

        return redirect()->route('admin.currencies.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->currencyRepo->deleteCategory($id)){
            Flash::success(__('admin_page_currencies.destroy_success'));
            return redirect()->route('admin.currencies.index');
        } else {
            Flash::error(__('admin_page_currencies.destroy_fail'));
            return redirect()->route('admin.currencies.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getCurrenciesTable(Request $request){

        //$this->currencyRepo->initializeTable($request, [Currency::COLUMN_ID,Currency::COLUMN_CODE,Currency::COLUMN_DESCRIPTION]);

        $adminTable = $this->currencyRepo->instantiateTableList();

        $this->setCurrenciesTableColumns($adminTable);

        return $adminTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setCurrenciesTableColumns($table):void
    {
        $table->addColumn(Currency::COLUMN_CODE)->setTitle(__('admin_page_currencies.table_head_currency_code'))
            ->isSortable()->isSearchable()->sortByDefault()->useForDestroyConfirmation();
        $table->addColumn(Currency::COLUMN_DESCRIPTION)->setTitle(__('admin_page_currencies.table_head_currency_description'));
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
