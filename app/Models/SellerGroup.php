<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerGroup extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_GROUP_NAME = 'group_name';
    const COLUMN_DESCRIPTION = 'description';

    const TABLE = 'seller_groups';
    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const GROUP_NAME = self::TABLE.'.'.self::COLUMN_GROUP_NAME;
    const DESCRIPTION = self::TABLE.'.'.self::COLUMN_DESCRIPTION;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_GROUP_NAME,self::COLUMN_DESCRIPTION
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_GROUP_NAME=> 'required|max:255|unique:'.self::TABLE
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
