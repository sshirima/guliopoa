<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProductSubcategory;
use App\Models\Product;
use App\Models\SubCategory;

class CreateProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductSubcategory::TABLE, function (Blueprint $table) {
            $table->increments(ProductSubcategory::COLUMN_ID);
            $table->unsignedInteger(ProductSubcategory::COLUMN_PRODUCT_ID);
            $table->unsignedInteger(ProductSubcategory::COLUMN_SUB_CATEGORY_ID);

            $table->foreign(ProductSubcategory::COLUMN_PRODUCT_ID)->references(Product::COLUMN_ID)->on(Product::TABLE)->onDelete('cascade');
            $table->foreign(ProductSubcategory::COLUMN_SUB_CATEGORY_ID)->references(SubCategory::COLUMN_ID)->on(SubCategory::TABLE)->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductSubcategory::TABLE);
    }
}
