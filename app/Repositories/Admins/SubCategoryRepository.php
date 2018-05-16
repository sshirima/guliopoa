<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;

class SubCategoryRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.sub_categories.index';
        $this->routeCreate = 'admin.sub_categories.create';
        $this->routeEdit = 'admin.sub_categories.edit';
        $this->routeDestroy = 'admin.sub_categories.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return SubCategory::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id){
        $subCategory = $this->findWithoutFail($id);

        if (empty($subCategory)){
            return false;
        }
        $subCategory->delete();
        return true;
    }

    /**
     * @param $table
     * @return mixed
     */
    public function setCustomTable($table){

        $table->addQueryInstructions(function ($query) {
            $query->select($this->entityColumns)
                ->join(Category::TABLE,Category::ID,'=',SubCategory::CATEGORY_ID)
                ->where($this->conditions);
        });

        return $table;
    }
}