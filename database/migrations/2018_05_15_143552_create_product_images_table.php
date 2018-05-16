<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProductImage;
use App\Models\Product;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductImage::TABLE, function (Blueprint $table) {
            $table->increments(ProductImage::COLUMN_ID);
            $table->string(ProductImage::COLUMN_IMAGE_NAME);
            $table->unsignedInteger(ProductImage::COLUMN_PRODUCT_ID);
            $table->timestamps();

            $table->foreign(ProductImage::COLUMN_PRODUCT_ID)->references(Product::COLUMN_ID)->on(Product::TABLE)->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductImage::TABLE);
    }
}
