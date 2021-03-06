<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    const COLUMN_ID = 'id';
    const COLUMN_FIRST_NAME = 'first_name';
    const COLUMN_LAST_NAME = 'last_name';
    const COLUMN_EMAIL = 'email';
    const COLUMN_PASSWORD = 'password';
    const COLUMN_PHONE_NUMBER = 'phone_number';
    const COLUMN_IS_ACTIVE = 'is_active';
    const COLUMN_REMEMBER_TOKEN = 'remember_token';

    const TABLE = 'users';

    const ID = self::TABLE.'.'.self::COLUMN_ID;
    const FIRST_NAME = self::TABLE.'.'.self::COLUMN_FIRST_NAME;
    const LAST_NAME = self::TABLE.'.'.self::COLUMN_LAST_NAME;
    const EMAIL = self::TABLE.'.'.self::COLUMN_EMAIL;
    const PASSWORD = self::TABLE.'.'.self::COLUMN_PASSWORD;
    const IS_ACTIVE = self::TABLE.'.'.self::COLUMN_IS_ACTIVE;
    const REMEMBER_TOKEN = self::TABLE.'.'.self::COLUMN_REMEMBER_TOKEN;
    const PHONE_NUMBER = self::TABLE.'.'.self::COLUMN_PHONE_NUMBER;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::COLUMN_FIRST_NAME,self::COLUMN_LAST_NAME, self::COLUMN_EMAIL, self::COLUMN_PASSWORD,self::COLUMN_PHONE_NUMBER
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::COLUMN_PASSWORD, self::COLUMN_REMEMBER_TOKEN,
    ];

    /**
     * @var array
     */
    public static $rules = [
        self::COLUMN_FIRST_NAME => 'required|max:255',
        self::COLUMN_LAST_NAME => 'required|max:255',
        self::COLUMN_EMAIL => 'required|string|email|max:255|unique:'.self::TABLE,
        self::COLUMN_PASSWORD => 'required',
    ];
}
