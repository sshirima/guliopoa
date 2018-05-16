<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class CategoryRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.categories.index';
        $this->routeCreate = 'admin.categories.create';
        $this->routeEdit = 'admin.categories.edit';
        $this->routeDestroy = 'admin.categories.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return Category::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id){
        $category = $this->findWithoutFail($id);

        if (empty($category)){
            return false;
        }
        $category->delete();
        return true;
    }
}