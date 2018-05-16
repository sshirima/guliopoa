<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ProductAttribute;
class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductAttribute::TABLE, function (Blueprint $table) {
            $table->increments(ProductAttribute::COLUMN_ID);
            $table->string(ProductAttribute::COLUMN_ATTRIBUTE_CODE)->unique();
            $table->string(ProductAttribute::COLUMN_ATTRIBUTE_NAME);
            $table->string(ProductAttribute::COLUMN_DESCRIPTION)->nullable();
            $table->enum(ProductAttribute::COLUMN_TYPE,ProductAttribute::DEFAULT_TYPES)->nullable()->default(ProductAttribute::DEFAULT_TYPES[0]);
        });

        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'color',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'color',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for color in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'size',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Size',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for size in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'ram',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'RAM',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for RAM in electronic products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'weight',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Weight',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for weight in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'model',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Model',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for model in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'brand',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Brand',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for brand in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'normal_price',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Normal price',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for normal price in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'offer_price',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Offer price',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for offer price in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'manufacture',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Manufacture',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for manufacture in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));
        DB::table(ProductAttribute::TABLE)->insert(array(ProductAttribute::COLUMN_ATTRIBUTE_CODE => 'version',ProductAttribute::COLUMN_ATTRIBUTE_NAME => 'Version',ProductAttribute::COLUMN_DESCRIPTION => 'This will hold value for manufacture in products',ProductAttribute::COLUMN_TYPE=>ProductAttribute::DEFAULT_TYPES[0]));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductAttribute::TABLE);
    }
}
