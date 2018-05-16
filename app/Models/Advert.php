<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_TITLE = 'title';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_EXPIRE_DATE = 'expire_date';
    const COLUMN_IS_APPROVED = 'is_approved';
    const COLUMN_APPROVED_DATE = 'approved_date';
    const COLUMN_APPROVED_BY = 'approved_by';
    const COLUMN_MERCHANT_ID = 'merchant_id';
    const COLUMN_ADVERT_TYPE = 'advert_type';
    const COLUMN_IMAGES = 'images';
    const COLUMN_CREATED_AT = 'created_at';
    const COLUMN_UPDATED_AT = 'updated_at';

    const TABLE = 'adverts';
    const ENUM_ADVERT_TYPES = array('Product','Service');

    const ID = self::TABLE . '.' . self::COLUMN_ID;
    const TITLE = self::TABLE . '.' . self::COLUMN_ID;
    const DESCRIPTION = self::TABLE . '.' . self::COLUMN_DESCRIPTION;
    const EXPIRE_DATE = self::TABLE . '.' . self::COLUMN_EXPIRE_DATE;
    const IS_APPROVED = self::TABLE . '.' . self::COLUMN_IS_APPROVED;
    const APPROVED_BY = self::TABLE . '.' . self::COLUMN_APPROVED_BY;
    const APPROVED_DATE = self::TABLE . '.' . self::COLUMN_APPROVED_DATE;
    const MERCHANT_ID = self::TABLE . '.' . self::COLUMN_MERCHANT_ID;
    const ADVERT_TYPE = self::TABLE . '.' . self::COLUMN_ADVERT_TYPE;
    const CREATED = self::TABLE . '.' . self::COLUMN_CREATED_AT;
    const UPDATED = self::TABLE . '.' . self::COLUMN_UPDATED_AT;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_TITLE,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_EXPIRE_DATE,
        self::COLUMN_IS_APPROVED,
        self::COLUMN_APPROVED_BY,
        self::COLUMN_APPROVED_DATE,
        self::COLUMN_MERCHANT_ID,
        self::COLUMN_ADVERT_TYPE,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_TITLE => 'required|max:255',
        self::COLUMN_DESCRIPTION => 'required',
        self::COLUMN_EXPIRE_DATE => 'required|date',
        self::COLUMN_IMAGES => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        self::COLUMN_MERCHANT_ID => 'required'
    ];


    /**
     * @var array
     */
    protected $casts = [
        self::COLUMN_TITLE => 'string',
        self::COLUMN_DESCRIPTION => 'string',
        self::COLUMN_APPROVED_DATE => 'date',
        self::COLUMN_IS_APPROVED => 'boolean',
        self::COLUMN_EXPIRE_DATE => 'date',
        self::COLUMN_MERCHANT_ID => 'integer'
    ];
}
