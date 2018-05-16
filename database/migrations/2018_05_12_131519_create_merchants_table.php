<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Merchant;
use App\Models\Seller;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Merchant::TABLE, function (Blueprint $table) {
            $table->increments(Merchant::COLUMN_ID);
            $table->string(Merchant::COLUMN_FIRST_NAME);
            $table->string(Merchant::COLUMN_LAST_NAME);
            $table->string(Merchant::COLUMN_PHONE_NUMBER);
            $table->string(Merchant::COLUMN_EMAIL)->unique();
            $table->string(Merchant::COLUMN_PASSWORD);
            $table->boolean(Merchant::COLUMN_IS_ACTIVE)->default(1);
            $table->unsignedInteger(Merchant::COLUMN_SELLER_ID);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign(Merchant::COLUMN_SELLER_ID)->references(Seller::COLUMN_ID)->on(Seller::TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Merchant::TABLE);
    }
}
