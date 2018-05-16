<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SubCategory;
use App\Models\Category;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SubCategory::TABLE, function (Blueprint $table) {
            $table->increments(SubCategory::COLUMN_ID);
            $table->string(SubCategory::COLUMN_NAME);
            $table->unsignedInteger(SubCategory::COLUMN_CATEGORY_ID);

            $table->foreign(SubCategory::COLUMN_CATEGORY_ID)->references(Category::COLUMN_ID)->on(Category::TABLE)->onDelete('cascade');

        });

        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Car Audio',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Car Care',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Car Electronics',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Car Safety & Security',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Car Video',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Exterior Accessories',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Cars',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'GPS',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Interior Accessories',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Motor sports',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Radar Detectors',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Replacement Parts',SubCategory::COLUMN_CATEGORY_ID=>1));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Freezers ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Irons & Garment Care ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Microwaves ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Refrigerators ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Sewing Machines ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Stoves & Ranges ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Dishwashers ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Vacuums & Floor Care ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Washers & Dryers ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Wine Coolers ',SubCategory::COLUMN_CATEGORY_ID=>2));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Bathroom Faucets ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Batteries ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Electrical ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Flooring ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Garage ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Hand Tools ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Hardware ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Heating & Cooling ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Home Safety & Security ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Kitchen & Bath Fixtures ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Paint & Wallpapers ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Plumbing ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Power Tools ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Tool Storage ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Shower Heads ',SubCategory::COLUMN_CATEGORY_ID=>3));
        DB::table(SubCategory::TABLE)->insert(array(SubCategory::COLUMN_NAME => 'Lighting ',SubCategory::COLUMN_CATEGORY_ID=>3));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(SubCategory::TABLE);
    }
}
