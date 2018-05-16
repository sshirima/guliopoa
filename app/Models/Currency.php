<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_CODE = 'code';
    const COLUMN_DESCRIPTION = 'description';

    const TABLE = 'currencies';
    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const CODE = self::TABLE.'.'.self::COLUMN_CODE;
    const DESCRIPTION = self::TABLE.'.'.self::COLUMN_DESCRIPTION;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_CODE,self::COLUMN_DESCRIPTION
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_CODE=> 'required|max:255|unique:'.self::TABLE
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
