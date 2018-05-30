<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;

class AddCostColumnProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Product::TABLE,function (Blueprint $table){
            $table->string(Product::COLUMN_NORMAL_PRICE)->nullable()->default(0);
            $table->string(Product::COLUMN_OFFER_PRICE)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Product::TABLE,function (Blueprint $table){
            $table->dropColumn(Product::COLUMN_NORMAL_PRICE);
            $table->dropColumn(Product::COLUMN_OFFER_PRICE);
        });
    }
}
