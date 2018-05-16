<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceDecision extends Model
{
    const COLUMN_ID = 'id';
    const COLUMN_DECISION_CODE = 'decision_code';
    const COLUMN_DECISION_NAME = 'decision_name';
    const COLUMN_DESCRIPTION = 'description';

    const TABLE = 'price_decisions';

    const DEFAULT_VALUE = 'Unit';

    protected $table = self::TABLE;

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const DECISION_CODE = self::TABLE.'.'.self::COLUMN_DECISION_CODE;
    const DECISION_NAME = self::TABLE.'.'.self::COLUMN_DECISION_NAME;
    const DESCRIPTION = self::TABLE.'.'.self::COLUMN_DESCRIPTION;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_DECISION_NAME,self::COLUMN_DESCRIPTION,self::COLUMN_DECISION_CODE
    ];

    /**
     * @var array
     */
    public static $create_rules = [
        self::COLUMN_DECISION_CODE=> 'required|max:255|unique:'.self::TABLE,
        self::COLUMN_DECISION_NAME=> 'required|max:255',
    ];

    /**
     * @var array
     */
    public static $update_rules = [

    ];

    public $timestamps = false;
}
