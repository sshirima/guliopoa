<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:14 PM
 */

namespace App\Http\Controllers\Admins;


use App\Http\Controllers\Admins\BaseController;
use App\Http\Requests\Admins\CreateAdminAccountRequest;
use App\Http\Requests\Admins\CreateLocationRequest;
use App\Http\Requests\Admins\PriceDecisions\CreatePriceDecisionRequest;
use App\Http\Requests\Admins\PriceDecisions\CreateProductRequest;
use App\Http\Requests\Admins\PriceDecisions\UpdatePriceDecisionRequest;
use App\Http\Requests\Admins\PriceDecisions\UpdateProductRequest;
use App\Http\Requests\Admins\UpdateAdminAccountRequest;
use App\Http\Requests\Admins\UpdateLocationRequest;
use App\Models\Admin;
use App\Models\Location;
use App\Models\PriceDecision;
use App\Repositories\Admins\AdminRepository;
use App\Repositories\Admins\LocationRepository;
use App\Repositories\Admins\PriceDecisionRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PriceDecisionController extends BaseController
{
    protected $priceDecisionRepo;

    /**
     * PriceDecisionController constructor.
     * @param PriceDecisionRepository $subCategoryRepository
     */
    public function __construct(PriceDecisionRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->priceDecisionRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.price_decisions.index')->with(['table'=>$this->getPriceDecisionTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.price_decisions.create');
    }

    /**
     * @param CreatePriceDecisionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePriceDecisionRequest $request){

        $location = $this->priceDecisionRepo->create($request->all());

        $this->createFlashResponse($location,__('admin_page_price_decisions.create_success'),__('admin_page_price_decisions.create_fail'));

        return redirect()->route('admin.price_decisions.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $priceDecision = $this->priceDecisionRepo->findWithoutFail($id);

        $this->createFlashResponse($priceDecision,null,__('admin_page_price_decisions.retrieve_fail'));

        return view('admins.pages.price_decisions.edit')->with(['priceDecision'=>$priceDecision]);
    }

    /**
     * @param UpdatePriceDecisionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePriceDecisionRequest $request, $id){

        $location = $this->priceDecisionRepo->update($request->all(),$id);

        $this->createFlashResponse($location,__('admin_page_price_decisions.update_success'),__('admin_page_price_decisions.update_fail'));

        return redirect()->route('admin.price_decisions.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->priceDecisionRepo->deletePriceDecision($id)){
            Flash::success(__('admin_page_price_decisions.destroy_success'));
            return redirect()->route('admin.price_decisions.index');
        } else {
            Flash::error(__('admin_page_price_decisions.destroy_fail'));
            return redirect()->route('admin.price_decisions.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getPriceDecisionTable(Request $request){

        /*$this->priceDecisionRepo->initializeTable($request, [PriceDecision::COLUMN_ID,PriceDecision::COLUMN_DECISION_NAME,
        PriceDecision::COLUMN_DESCRIPTION,PriceDecision::COLUMN_DECISION_CODE]);*/

        $table = $this->priceDecisionRepo->instantiateTableList();

        $this->setLocationsTableColumns($table);

        return $table;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setLocationsTableColumns($table):void
    {
        $table->addColumn(PriceDecision::COLUMN_DECISION_CODE)->setTitle(__('admin_page_price_decisions.table_head_code'))
            ->isSortable()->sortByDefault()->isSearchable();
        $table->addColumn(PriceDecision::COLUMN_DECISION_NAME)->setTitle(__('admin_page_price_decisions.table_head_factor'))
            ->isSortable()->isSearchable()->useForDestroyConfirmation();
        $table->addColumn(PriceDecision::COLUMN_DESCRIPTION)->setTitle(__('admin_page_price_decisions.table_head_description'))
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