<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\SellerGroup;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class SellerGroupRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.seller_groups.index';
        $this->routeCreate = 'admin.seller_groups.create';
        $this->routeEdit = 'admin.seller_groups.edit';
        $this->routeDestroy = 'admin.seller_groups.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return SellerGroup::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteSellerGroup($id){
        $sellerGroup = $this->findWithoutFail($id);

        if (empty($sellerGroup)){
            return false;
        }
        $sellerGroup->delete();
        return true;
    }
}