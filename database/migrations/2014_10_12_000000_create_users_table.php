<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->increments(User::COLUMN_ID);
            $table->string(User::COLUMN_FIRST_NAME);
            $table->string(User::COLUMN_LAST_NAME)->nullable();
            $table->string(User::COLUMN_PHONE_NUMBER)->nullable();
            $table->string(User::COLUMN_EMAIL)->unique()->index();
            $table->string(User::COLUMN_PASSWORD);
            $table->boolean(User::COLUMN_IS_ACTIVE)->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLE);
    }
}
