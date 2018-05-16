<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_NAME = 'sub_category_name';
    const COLUMN_CATEGORY_ID = 'category_id';

    const TABLE = 'sub_categories';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const NAME = self::TABLE.'.'.self::COLUMN_NAME;
    const CATEGORY_ID = self::TABLE.'.'.self::COLUMN_CATEGORY_ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_NAME,self::COLUMN_CATEGORY_ID
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_NAME=> 'required|max:255|unique:'.self::TABLE
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
