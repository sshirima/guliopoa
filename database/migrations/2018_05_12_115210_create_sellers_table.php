<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Seller;
use App\Models\SellerGroup;
use App\Models\Admin;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Seller::TABLE, function (Blueprint $table) {
            $table->increments(Seller::COLUMN_ID);
            $table->string(Seller::COLUMN_SELLER_NAME);
            $table->string(Seller::COLUMN_DESCRIPTION)->nullable();
            $table->unsignedInteger(Seller::COLUMN_SELLER_GROUP_ID);
            $table->unsignedInteger(Seller::COLUMN_CREATED_BY)->nullable();
            $table->unsignedInteger(Seller::COLUMN_IS_ACTIVE)->default(1);
            $table->timestamps();

            $table->foreign(Seller::COLUMN_SELLER_GROUP_ID)->references(SellerGroup::COLUMN_ID)->on(SellerGroup::TABLE)->onDelete('cascade');
            $table->foreign(Seller::COLUMN_CREATED_BY)->references(Admin::COLUMN_ID)->on(Admin::TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Seller::TABLE);
    }
}
