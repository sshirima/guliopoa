<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\Location;
use App\Models\PriceDecision;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;
use Illuminate\Http\Request;

class PriceDecisionRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.price_decisions.index';
        $this->routeCreate = 'admin.price_decisions.create';
        $this->routeEdit = 'admin.price_decisions.edit';
        $this->routeDestroy = 'admin.price_decisions.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return PriceDecision::class;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deletePriceDecision($id){
        $location = $this->findWithoutFail($id);

        if (empty($location)){
            return false;
        }
        $location->delete();
        return true;
    }

    public function assignPriceDecision(Request $request, $productId){
        $product = Product::find($productId);

        if (empty($product)){
            return false;
        } else{
            $product[Product::COLUMN_PRICE_DECISION_ID] = $request[Product::COLUMN_PRICE_DECISION_ID];
            $product->update();
        }
         return ProductAttributesRepository::updateProductPrices($request, $productId);
    }

    /**
     * @return array
     */
    public function getPriceDecisionArray(){
        $priceDecisions = $this->all();
        $types = array(__('admin_page_price_decisions.field_input_select'));
        foreach ($priceDecisions as $key=>$value){
            $types[$value[PriceDecision::COLUMN_ID]] =  $value[PriceDecision::COLUMN_DECISION_NAME];
        }
        return $types;
    }
}