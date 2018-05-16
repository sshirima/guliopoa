<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertCategory extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_ADVERT_ID = 'advert_id';
    const COLUMN_CATEGORY_ID = 'user_id';

    const TABLE = 'advert_category';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const ADVERT_ID = self::TABLE.'.'.self::COLUMN_ADVERT_ID;
    const CATEGORY_ID = self::TABLE.'.'.self::COLUMN_CATEGORY_ID;

    protected $table = self::TABLE;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_ADVERT_ID,
        self::COLUMN_CATEGORY_ID,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_ADVERT_ID=> 'required',
        self::COLUMN_CATEGORY_ID=> 'required',
    ];
}
