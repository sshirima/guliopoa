<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Location;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class LocationRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.locations.index';
        $this->routeCreate = 'admin.locations.create';
        $this->routeEdit = 'admin.locations.edit';
        $this->routeDestroy = 'admin.locations.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Location::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id){
        $location = $this->findWithoutFail($id);

        if (empty($location)){
            return false;
        }
        $location->delete();
        return true;
    }
}