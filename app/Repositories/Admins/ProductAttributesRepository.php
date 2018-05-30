<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/10/2018
 * Time: 9:41 PM
 */

namespace App\Repositories\Admins;

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Repositories\BaseRepository;
use App\Repositories\DefaultRepository;
use Illuminate\Container\Container as Application;
use Illuminate\Http\Request;

class ProductAttributesRepository extends BaseRepository
{

    use DefaultRepository;

    protected $routeIndex;
    protected $routeEdit;
    protected $routeCreate;
    protected $routeDestroy;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->routeIndex = 'admin.product_attributes.index';
        $this->routeCreate = 'admin.product_attributes.create';
        $this->routeEdit = 'admin.product_attributes.edit';
        $this->routeDestroy = 'admin.product_attributes.destroy';
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return ProductAttribute::class;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes[ProductAttribute::COLUMN_TYPE] = ProductAttribute::DEFAULT_TYPES[$attributes[ProductAttribute::COLUMN_TYPE]-1];
        return parent::create($attributes); // TODO: Change the autogenerated stub
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $attributes[ProductAttribute::COLUMN_TYPE] = ProductAttribute::DEFAULT_TYPES[$attributes[ProductAttribute::COLUMN_TYPE]-1];
        return parent::update($attributes, $id); // TODO: Change the autogenerated stub
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteProductAttribute($id){
        $productAttribute = $this->findWithoutFail($id);

        if (empty($productAttribute)){
            return false;
        }
        $productAttribute->delete();
        return true;
    }

    /**
     * @return array
     */
    public function getTypeSelectArray(){
        $defaultTypes = ProductAttribute::DEFAULT_TYPES;
        $types = array(__('admin_page_product_attributes.field_input_select_type_default'));
        $i =1;
        foreach ($defaultTypes as $type){
            $types[$i] =  $type;
            $i++;
        }
        return $types;
    }

    /**
     * @param Request $request
     * @param $productId
     * @return bool
     */
    public static function updateProductPrices(Request $request, $productId){

        $normalPrice = self::updateValueFromRequest($request, $productId, ProductAttribute::DEFAULT_CODE_NP);

        $offerPrices = self::updateValueFromRequest($request, $productId, ProductAttribute::DEFAULT_CODE_OP);

        return $normalPrice&&$offerPrices;

    }

    /**
     * @param Request $request
     * @param $productId
     * @param $code
     * @return bool
     */
    private static function updateValueFromRequest(Request $request, $productId, $code){
        if ($request->has($code)){
            $normalPrice = ProductAttributesRepository::getAttributeByCode($code);
            self::updateProductValue($productId, $normalPrice[ProductAttribute::COLUMN_ID], $request[$code]);
            return true;
        } else{
            return false;
        }
    }

    /**
     * @param $productId
     * @param $attributeId
     * @param $value
     * @return mixed
     */
    public static function updateProductValue($productId, $attributeId, $value){
        return ProductAttributeValue::updateOrCreate([
            ProductAttributeValue::COLUMN_ATTRIBUTE_ID=>$attributeId,
            ProductAttributeValue::COLUMN_PRODUCT_ID=>$productId,
        ],[
            ProductAttributeValue::COLUMN_VALUE=>$value,
        ]);
    }

    /**
     * @param $code
     * @param array $columns
     * @return mixed
     */
    public static function getAttributeByCode($code, $columns=[ProductAttribute::COLUMN_ID,ProductAttribute::COLUMN_ATTRIBUTE_CODE]){
        return ProductAttribute::select($columns)->where([ProductAttribute::COLUMN_ATTRIBUTE_CODE=>$code])->first();
    }

    /**
     * @return array
     */
    public static function getAttributeArray(){
        $priceDecisions = ProductAttribute::all();
        $types = array(__('admin_page_price_decisions.field_input_select_attribute'));
        foreach ($priceDecisions as $key=>$value){
            $types[$value[ProductAttribute::COLUMN_ID]] =  $value[ProductAttribute::COLUMN_ATTRIBUTE_NAME];
        }
        return $types;
    }

    /**
     * @param Request $request
     * @param $productId
     * @return bool
     */
    public function updateAttributes(Request $request, $productId){
        $attributes  = $request['attributes'];

        foreach ($attributes['ids'] as $key=>$value){
            self::updateProductValue($productId,$value,$attributes['values'][$key]);
        }
        return true;
    }
}