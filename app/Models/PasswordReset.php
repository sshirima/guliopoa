<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    const COLUMN_EMAIL= 'email';
    const COLUMN_TOKEN = 'token';
    const COLUMN_CREATED_AT = 'created_at';

    const TABLE = 'password_resets';

    const EMAIL = self::TABLE.'.'.self::COLUMN_EMAIL;
    const TOKEN = self::TABLE.'.'.self::COLUMN_TOKEN;
    const CREATED_TIME = self::TABLE.'.'.self::COLUMN_CREATED_AT;
}
