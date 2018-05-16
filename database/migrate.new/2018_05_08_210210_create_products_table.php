<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;
use App\Models\Advert;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Product::TABLE, function (Blueprint $table) {
            $table->increments(Product::COLUMN_ID);
            $table->string(Product::COLUMN_PRODUCT_NAME);
            $table->string(Product::COLUMN_PRODUCT_DESCRIPTION)->nullable();
            $table->string(Product::COLUMN_MANUFACTURE)->nullable();
            $table->string(Product::COLUMN_MODEL)->nullable();
            $table->unsignedinteger(Product::COLUMN_CURRENT_PRICE);
            $table->unsignedinteger(Product::COLUMN_PREVIOUS_PRICE);
            $table->integer(Product::COLUMN_ADVERT_ID)->unsigned();
            $table->timestamps();

            $table->foreign(Product::COLUMN_ADVERT_ID)->references(Advert::COLUMN_ID)->on(Advert::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Product::TABLE);
    }
}
