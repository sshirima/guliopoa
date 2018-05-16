<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App\Models
 */
class Service extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_SERVICE_NAME = 'service_name';
    const COLUMN_SERVICE_BRAND = 'service_brand';
    const COLUMN_PREVIOUS_PRICE = 'previous_price';
    const COLUMN_CURRENT_PRICE = 'current_price';
    const COLUMN_ADVERT_ID = 'advert_id';
    const COLUMN_CREATED_AT = 'created_at';
    const COLUMN_UPDATED_AT = 'update_at';

    const TABLE = 'services';

    const ID = self::TABLE . '.' . self::COLUMN_ID;
    const SERVICE_NAME = self::TABLE . '.' . self::COLUMN_SERVICE_NAME;
    const BRAND = self::TABLE . '.' . self::COLUMN_SERVICE_BRAND;
    const PREVIOUS_PRICE = self::TABLE . '.' . self::COLUMN_PREVIOUS_PRICE;
    const CURRENT_PRICE = self::TABLE . '.' . self::COLUMN_CURRENT_PRICE;
    const ADVERT_ID = self::TABLE . '.' . self::COLUMN_ADVERT_ID;
    const CREATED_TIME = self::TABLE . '.' . self::COLUMN_CREATED_AT;
    const UPDATED_TIME = self::TABLE . '.' . self::COLUMN_UPDATED_AT;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_SERVICE_NAME,
        self::COLUMN_SERVICE_BRAND,
        self::COLUMN_ADVERT_ID,
        self::COLUMN_PREVIOUS_PRICE,
        self::COLUMN_CURRENT_PRICE,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_SERVICE_NAME => 'required|max:50',
        self::COLUMN_PREVIOUS_PRICE => 'required|numeric',
        self::COLUMN_CURRENT_PRICE => 'required|numeric',
        self::COLUMN_ADVERT_ID => 'required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        self::COLUMN_SERVICE_NAME => 'string',
        self::COLUMN_SERVICE_BRAND => 'string',
        self::COLUMN_ADVERT_ID => 'integer'
    ];
}
