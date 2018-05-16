<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_PRODUCT_ID = 'product_id';
    const COLUMN_ATTRIBUTE_ID = 'product_attribute_id';
    const COLUMN_VALUE = 'value';

    const TABLE = 'product_attribute_values';

    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const NAME = self::TABLE.'.'.self::COLUMN_PRODUCT_ID;
    const ATTRIBUTE_ID = self::TABLE.'.'.self::COLUMN_ATTRIBUTE_ID;
    const VALUE = self::TABLE.'.'.self::COLUMN_VALUE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_PRODUCT_ID,self::COLUMN_ATTRIBUTE_ID,self::COLUMN_VALUE
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_PRODUCT_ID=> 'required|integer|min:1',
        self::COLUMN_ATTRIBUTE_ID=> 'required|integer|min:1',
        self::COLUMN_VALUE=> 'required',
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
