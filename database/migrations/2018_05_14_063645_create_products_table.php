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
            $table->string(Product::COLUMN_SKU)->nullable();
            $table->string(Product::COLUMN_PRODUCT_NAME);
            $table->text(Product::COLUMN_PRODUCT_DESCRIPTION);
            $table->enum(Product::COLUMN_PRODUCT_TYPE,Product::DEFAULT_TYPES);
            $table->unsignedInteger(Product::COLUMN_SELLER_ID);
            $table->unsignedInteger(Product::COLUMN_PRICE_DECISION_ID)->nullable();
            $table->date(Product::COLUMN_EXPIRE_DATE)->nullable();
            $table->boolean(Product::COLUMN_IS_ACTIVE)->default(0);
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
        Schema::dropIfExists(Product::TABLE);
    }
}
