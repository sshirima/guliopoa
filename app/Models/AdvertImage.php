<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertImage extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_IMAGE_NAME = 'image_name';
    const COLUMN_ADVERT_ID = 'advert_id';
    const COLUMN_CREATED_AT = 'created_at';
    const COLUMN_UPDATED_AT = 'updated_at';

    const TABLE = 'advert_images';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const IMAGE_NAME = self::TABLE.'.'.self::COLUMN_IMAGE_NAME;
    const ADVERT_ID = self::TABLE.'.'.self::COLUMN_ADVERT_ID;
    const CREATED = self::TABLE.'.'.self::COLUMN_CREATED_AT;
    const UPDATED = self::TABLE.'.'.self::COLUMN_UPDATED_AT;

    protected $table = self::TABLE;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_IMAGE_NAME,
        self::COLUMN_ADVERT_ID,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_IMAGE_NAME=> 'required|max:255|unique:'.self::TABLE,
        self::COLUMN_ADVERT_ID=> 'required',
    ];
}
