<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Admin;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class AdminRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.admin_accounts.index';
        $this->routeCreate = 'admin.admin_accounts.create';
        $this->routeEdit = 'admin.admin_accounts.edit';
        $this->routeDestroy = 'admin.admin_accounts.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Admin::class;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes[Admin::COLUMN_PASSWORD] = bcrypt($attributes[Admin::COLUMN_PASSWORD]);
        return parent::create($attributes); // TODO: Change the autogenerated stub
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        if(array_key_exists(Admin::COLUMN_PASSWORD, $attributes)){
            $attributes[Admin::COLUMN_PASSWORD] = bcrypt($attributes[Admin::COLUMN_PASSWORD]);
        }
        return parent::update($attributes, $id); // TODO: Change the autogenerated stub
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteAccount($id){
        $admin = $this->findWithoutFail($id);

        if ($admin->id == auth()->user()->id || $admin->email == 'admin@localhost.com'){
            return false;
        }
        $admin->delete();

        return true;
    }
}