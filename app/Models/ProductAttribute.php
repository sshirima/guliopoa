<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_ATTRIBUTE_CODE = 'attribute_code';
    const COLUMN_ATTRIBUTE_NAME = 'attribute_name';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_TYPE = 'attribute_type';
    const DEFAULT_TYPES = array('text','integer','checkbox','percent','textarea','date','datetime');

    const TABLE = 'product_attributes';

    const DEFAULT_CODE_NP = 'normal_price';
    const DEFAULT_CODE_OP = 'offer_price';

    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const CODE = self::TABLE.'.'.self::COLUMN_ATTRIBUTE_CODE;
    const DECISION_FACTOR = self::TABLE.'.'.self::COLUMN_ATTRIBUTE_NAME;
    const DESCRIPTION = self::TABLE.'.'.self::COLUMN_DESCRIPTION;
    const TYPE = self::TABLE.'.'.self::COLUMN_TYPE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_ATTRIBUTE_NAME,self::COLUMN_DESCRIPTION,self::COLUMN_TYPE,self::COLUMN_ATTRIBUTE_CODE
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_ATTRIBUTE_CODE=> 'required|max:255|unique:'.self::TABLE,
        self::COLUMN_ATTRIBUTE_NAME=> 'required|max:255',
        self::COLUMN_TYPE=> 'required|integer|min:1',
    ];

    /**
     * @var array
     */
    public static $update_rules = [
        self::COLUMN_ATTRIBUTE_NAME=> 'required|max:255',
        self::COLUMN_TYPE=> 'required|integer|min:1',
    ];

    public $timestamps = false;
}
