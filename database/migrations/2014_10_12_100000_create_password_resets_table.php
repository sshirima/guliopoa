<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PasswordReset;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PasswordReset::TABLE, function (Blueprint $table) {
            $table->string(PasswordReset::COLUMN_EMAIL);
            $table->string(PasswordReset::COLUMN_TOKEN);
            $table->timestamp(PasswordReset::COLUMN_CREATED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PasswordReset::TABLE);
    }
}
