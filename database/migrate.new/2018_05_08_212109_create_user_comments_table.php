<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\UserComment;
use App\Models\User;
use App\Models\Advert;

class CreateUserCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserComment::TABLE, function (Blueprint $table) {
            $table->increments(UserComment::COLUMN_ID);
            $table->text(UserComment::COLUMN_MESSAGE);
            $table->unsignedInteger(UserComment::COLUMN_USER_ID);
            $table->unsignedInteger(UserComment::COLUMN_ADVERT_ID);
            $table->timestamps();

            $table->foreign(UserComment::COLUMN_ADVERT_ID)->references(Advert::COLUMN_ID)->on(Advert::TABLE);

            $table->foreign(UserComment::COLUMN_USER_ID)->references(User::TABLE)->on(User::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserComment::TABLE);
    }
}
