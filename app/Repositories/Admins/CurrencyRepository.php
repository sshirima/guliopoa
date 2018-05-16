<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Currency;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class CurrencyRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.currencies.index';
        $this->routeCreate = 'admin.currencies.create';
        $this->routeEdit = 'admin.currencies.edit';
        $this->routeDestroy = 'admin.currencies.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Currency::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id){
        $currency = $this->findWithoutFail($id);

        if (empty($currency)){
            return false;
        }
        $currency->delete();
        return true;
    }
}