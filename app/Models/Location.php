<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_NAME = 'location_name';
    const COLUMN_LOCATION_ID = 'location_id';

    const TABLE = 'locations';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const NAME = self::TABLE.'.'.self::COLUMN_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_NAME
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
        self::COLUMN_NAME=> 'required|max:255|unique:'.self::TABLE
    ];

    public $timestamps = false;
}
