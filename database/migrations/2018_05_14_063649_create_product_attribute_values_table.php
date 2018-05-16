<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProductAttributeValue;
use App\Models\Product;
use App\Models\ProductAttribute;

class CreateProductAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductAttributeValue::TABLE, function (Blueprint $table) {
            $table->increments(ProductAttributeValue::COLUMN_ID);
            $table->unsignedInteger(ProductAttributeValue::COLUMN_PRODUCT_ID);
            $table->unsignedInteger(ProductAttributeValue::COLUMN_ATTRIBUTE_ID);
            $table->string(ProductAttributeValue::COLUMN_VALUE);

            $table->foreign(ProductAttributeValue::COLUMN_PRODUCT_ID)->references(Product::COLUMN_ID)->on(Product::TABLE)->onDelete('cascade');
            $table->foreign(ProductAttributeValue::COLUMN_ATTRIBUTE_ID)->references(ProductAttribute::COLUMN_ID)->on(ProductAttribute::TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductAttributeValue::TABLE);
    }
}
