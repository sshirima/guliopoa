<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_IMAGE_NAME = 'image_name';
    const COLUMN_PRODUCT_ID = 'product_id';

    const TABLE = 'product_images';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const IMAGE_NAME = self::TABLE.'.'.self::COLUMN_IMAGE_NAME;
    const PRODUCT_ID = self::TABLE.'.'.self::COLUMN_PRODUCT_ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_IMAGE_NAME,self::COLUMN_PRODUCT_ID
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_IMAGE_NAME=> 'required|min:1',
        self::COLUMN_PRODUCT_ID=> 'required|min:1',
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
