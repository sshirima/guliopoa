<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_PRODUCT_ID = 'product_id';
    const COLUMN_SUB_CATEGORY_ID = 'subcategory_id';

    const TABLE = 'product_subcategories';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const PRODUCT_ID = self::TABLE.'.'.self::COLUMN_PRODUCT_ID;
    const SUB_CATEGORY_ID = self::TABLE.'.'.self::COLUMN_SUB_CATEGORY_ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_PRODUCT_ID,self::COLUMN_SUB_CATEGORY_ID
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_PRODUCT_ID=> 'required|min:1',
        self::COLUMN_SUB_CATEGORY_ID=> 'required|min:1',
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
