<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_SKU = 'sku';
    const COLUMN_PRODUCT_NAME = 'product_name';
    const COLUMN_PRODUCT_TYPE = 'product_type';
    const COLUMN_PRODUCT_DESCRIPTION = 'product_description';
    const COLUMN_SELLER_ID = 'seller_id';
    const COLUMN_PRICE_DECISION_ID = 'price_decision_id';
    const COLUMN_EXPIRE_DATE = 'expiry_date';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_OFFER_PRICE = 'offer_price';
    const COLUMN_NORMAL_PRICE = 'normal_price';

    const TABLE = 'products';
    const DEFAULT_TYPES = array('GOODS','SERVICES');

    const ID = self::TABLE . '.' . self::COLUMN_ID;
    const SKU = self::TABLE . '.' . self::COLUMN_SKU;
    const PRODUCT_NAME = self::TABLE . '.' . self::COLUMN_PRODUCT_NAME;
    const TYPE = self::TABLE . '.' . self::COLUMN_PRODUCT_TYPE;
    const PRODUCT_DESCRIPTION = self::TABLE . '.' . self::COLUMN_PRODUCT_DESCRIPTION;
    const SELLER_ID = self::TABLE . '.' . self::COLUMN_SELLER_ID;
    const PRICE_DECISION_ID = self::TABLE . '.' . self::COLUMN_PRICE_DECISION_ID;
    const EXPIRY_DATE = self::TABLE . '.' . self::COLUMN_EXPIRE_DATE;
    const IS_ACTIVE = self::TABLE . '.' . self::COLUMN_IS_ACTIVE;
    const CREATED_TIME = self::TABLE . '.' . self::CREATED_AT;
    const UPDATED_TIME = self::TABLE . '.' . self::UPDATED_AT;
    const OFFER_PRICE = self::TABLE . '.' . self::COLUMN_OFFER_PRICE;
    const NORMAL_PRICE = self::TABLE . '.' . self::COLUMN_NORMAL_PRICE;

    const REL_PRODUCT_IMAGES = 'productImages';
    const REL_IMAGES = 'images';
    const REL_SUBCATEGORIES = 'subcategories';
    const REL_SELLER = 'seller';
    const REL_ATTRIBUTES = 'attributes';
    const REL_PRICE_DECISION = 'priceDecision';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_PRODUCT_NAME,
        self::COLUMN_PRODUCT_DESCRIPTION,
        self::COLUMN_EXPIRE_DATE,
        self::COLUMN_PRODUCT_TYPE,
        self::COLUMN_SELLER_ID,
        self::COLUMN_OFFER_PRICE,
        self::COLUMN_NORMAL_PRICE,
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_PRODUCT_NAME => 'required|max:255',
        self::COLUMN_PRODUCT_DESCRIPTION => 'required',
        self::COLUMN_OFFER_PRICE => 'required|integer',
        self::COLUMN_NORMAL_PRICE => 'required|integer',
        self::REL_SUBCATEGORIES.'.*' => 'required|min:1',
        self::REL_PRODUCT_IMAGES => 'required',
        self::REL_PRODUCT_IMAGES.'.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * @var array
     */
    public static $update_rules = [
        self::COLUMN_PRODUCT_NAME => 'required|max:255',
        self::COLUMN_PRODUCT_DESCRIPTION => 'required',
        self::COLUMN_OFFER_PRICE => 'required|integer',
        self::COLUMN_NORMAL_PRICE => 'required|integer',
        self::REL_SUBCATEGORIES.'.*' => 'required|min:1',
        self::REL_PRODUCT_IMAGES => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        self::COLUMN_PRODUCT_NAME => 'string',
        self::COLUMN_PRODUCT_DESCRIPTION => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subcategories(){
        return $this->belongsToMany(SubCategory::class,ProductSubcategory::TABLE,ProductSubcategory::COLUMN_PRODUCT_ID,ProductSubcategory::COLUMN_SUB_CATEGORY_ID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(){
        return $this->hasMany(ProductImage::class,ProductImage::COLUMN_PRODUCT_ID,Product::COLUMN_ID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller(){
        return $this->belongsTo(Seller::class, self::COLUMN_SELLER_ID, Seller::COLUMN_ID);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes(){
        return $this->belongsToMany(ProductAttribute::class,ProductAttributeValue::TABLE,
            ProductAttributeValue::COLUMN_PRODUCT_ID,ProductAttributeValue::COLUMN_ATTRIBUTE_ID)->withPivot(ProductAttributeValue::COLUMN_VALUE);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priceDecision(){
        return $this->belongsTo(PriceDecision::class,self::COLUMN_PRICE_DECISION_ID,PriceDecision::COLUMN_ID);
    }

    /**
     * Make sure small chunk of the whole post is displayed
     * @param $str
     * @param int $startPos
     * @param int $maxLength
     * @return bool|string
     */
    public static function getExcerpt($str, $startPos = 0, $maxLength = 50) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength - 6);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= ' ...';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }
}
