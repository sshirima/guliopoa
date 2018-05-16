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
use App\Http\Requests\Admins\UpdateAdminAccountRequest;
use App\Http\Requests\Admins\UpdateLocationRequest;
use App\Models\Admin;
use App\Models\Location;
use App\Repositories\Admins\AdminRepository;
use App\Repositories\Admins\LocationRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class LocationController extends BaseController
{
    protected $locationRepo;

    /**
     * LocationController constructor.
     * @param LocationRepository $subCategoryRepository
     */
    public function __construct(LocationRepository $subCategoryRepository)
    {
        parent::__construct();
        $this->locationRepo = $subCategoryRepository;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request){
        return view('admins.pages.locations.index')->with(['table'=>$this->getLocationTable($request)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admins.pages.locations.create');
    }

    /**
     * @param CreateLocationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateLocationRequest $request){

        $location = $this->locationRepo->create($request->all());

        $this->createFlashResponse($location,__('admin_page_locations.create_success'),__('admin_page_locations.create_fail'));

        return redirect()->route('admin.locations.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id){
        $location = $this->locationRepo->findWithoutFail($id);

        $this->createFlashResponse($location,null,__('admin_page_locations.retrieve_fail'));

        return view('admins.pages.locations.edit')->with(['location'=>$location]);
    }

    /**
     * @param UpdateLocationRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLocationRequest $request, $id){

        $location = $this->locationRepo->update($request->all(),$id);

        $this->createFlashResponse($location,__('admin_page_locations.update_success'),__('admin_page_locations.update_fail'));

        return redirect()->route('admin.locations.index');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){

        if ($this->locationRepo->deleteCategory($id)){
            Flash::success(__('admin_page_locations.destroy_success'));
            return redirect()->route('admin.locations.index');
        } else {
            Flash::error(__('admin_page_locations.destroy_fail'));
            return redirect()->route('admin.locations.index');
        }
    }

    /**
     * Prepare and instantiate table
     * @param Request $request
     * @return mixed
     */
    private function getLocationTable(Request $request){

        //$this->locationRepo->initializeTable($request, [Location::COLUMN_ID,Location::COLUMN_NAME]);

        $adminTable = $this->locationRepo->instantiateTableList();

        $this->setLocationsTableColumns($adminTable);

        return $adminTable;
    }

    /**
     * Prepare set table columns
     * @param $table
     */
    private function setLocationsTableColumns($table):void
    {
        $table->addColumn(Location::COLUMN_NAME)->setTitle(__('admin_page_locations.table_head_location_name'))
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