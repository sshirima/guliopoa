<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Admin;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Admin::TABLE, function (Blueprint $table) {
            $table->increments(Admin::COLUMN_ID);
            $table->string(Admin::COLUMN_FIRST_NAME);
            $table->string(Admin::COLUMN_LAST_NAME)->nullable();
            $table->string(Admin::COLUMN_PHONE_NUMBER)->nullable();
            $table->string(Admin::COLUMN_EMAIL)->unique();
            $table->string(Admin::COLUMN_PASSWORD);
            $table->boolean(Admin::IS_ACTIVE)->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert default admin account
        DB::table(Admin::TABLE)->insert(
            array(
                Admin::COLUMN_FIRST_NAME => 'Admin',
                Admin::COLUMN_LAST_NAME => 'Default',
                Admin::COLUMN_EMAIL => 'admin@localhost.com',
                Admin::COLUMN_PASSWORD => bcrypt('password')
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Admin::TABLE);
    }
}
