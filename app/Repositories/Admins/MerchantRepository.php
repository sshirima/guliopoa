<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Admin;
use App\Models\Merchant;
use App\Models\Seller;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class MerchantRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.merchant_accounts.index';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Merchant::class;
    }

    /**
     * @param $table
     * @return mixed
     */
    public function setCustomTable($table){

        $table->addQueryInstructions(function ($query) {
            $query->select($this->entityColumns)
                ->join(Seller::TABLE,Seller::ID,'=',Merchant::SELLER_ID)
                ->where($this->conditions);
        });

        return $table;
    }
}