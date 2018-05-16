<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\UserRate;
use App\Models\Advert;
use App\Models\User;

class CreateUserRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserRate::TABLE, function (Blueprint $table) {
            $table->increments(UserRate::COLUMN_ID);
            $table->unsignedInteger(UserRate::COLUMN_VALUE);
            $table->unsignedInteger(UserRate::COLUMN_USER_ID);
            $table->unsignedInteger(UserRate::COLUMN_ADVERT_ID);
            $table->timestamps();

            $table->foreign(UserRate::COLUMN_ADVERT_ID)->references(Advert::COLUMN_ID)->on(Advert::TABLE);

            $table->foreign(UserRate::COLUMN_USER_ID)->references(User::TABLE)->on(User::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserRate::TABLE);
    }
}
