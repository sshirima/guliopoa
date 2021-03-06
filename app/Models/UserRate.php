<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_VALUE = 'message';
    const COLUMN_ADVERT_ID = 'advert_id';
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_CREATED_AT = 'created_at';
    const COLUMN_UPDATED_AT = 'updated_at';

    const TABLE = 'user_rates';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const VALUE = self::TABLE.'.'.self::COLUMN_VALUE;
    const ADVERT_ID = self::TABLE.'.'.self::COLUMN_ADVERT_ID;
    const USER_ID = self::TABLE.'.'.self::COLUMN_USER_ID;
    const CREATED = self::TABLE.'.'.self::COLUMN_CREATED_AT;
    const UPDATED = self::TABLE.'.'.self::COLUMN_UPDATED_AT;

    protected $table = self::TABLE;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_VALUE,
        self::COLUMN_ADVERT_ID,
        self::COLUMN_USER_ID,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_VALUE=> 'required',
        self::COLUMN_ADVERT_ID=> 'required',
        self::COLUMN_USER_ID=> 'required',
    ];
}
