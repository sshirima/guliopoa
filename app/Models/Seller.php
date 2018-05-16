<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_SELLER_NAME = 'seller_name';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_SELLER_GROUP_ID = 'group_id';
    const COLUMN_CREATED_BY = 'created_by';
    const COLUMN_IS_ACTIVE = 'is_active';

    const TABLE = 'sellers';

    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const SELLER_NAME = self::TABLE.'.'.self::COLUMN_SELLER_NAME;
    const DESCRIPTION = self::TABLE.'.'.self::COLUMN_DESCRIPTION;
    const IS_ACTIVE = self::TABLE.'.'.self::COLUMN_IS_ACTIVE;
    const CREATED_BY = self::TABLE.'.'.self::COLUMN_CREATED_BY;
    const SELLER_GROUP_ID = self::TABLE.'.'.self::COLUMN_SELLER_GROUP_ID;
    const CREATED_TIME = self::TABLE.'.'.self::CREATED_AT;
    const UPDATED_TIME = self::TABLE.'.'.self::UPDATED_AT;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_SELLER_NAME,self::COLUMN_DESCRIPTION,self::COLUMN_IS_ACTIVE,self::COLUMN_CREATED_BY,self::COLUMN_SELLER_GROUP_ID
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_SELLER_NAME=> 'required|max:255|unique:'.self::TABLE,
        self::COLUMN_SELLER_GROUP_ID=> 'required|integer',
        Merchant::COLUMN_FIRST_NAME => 'required|max:255',
        Merchant::COLUMN_EMAIL => 'required|string|email|max:255|unique:'.Merchant::TABLE,
        Merchant::COLUMN_PASSWORD => 'required|string|min:6|confirmed',
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public function staffs(){
        $this->hasMany(Merchant::class,Merchant::COLUMN_SELLER_ID,Seller::COLUMN_ID);
    }
}
