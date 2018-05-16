<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Category::TABLE, function (Blueprint $table) {
            $table->increments(Category::COLUMN_ID);
            $table->string(Category::COLUMN_NAME);
        });

        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Automotive'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home appliance'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home improvement'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Patio & Garden'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Baby care'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Badding & bath'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Book, Music & movies'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Boys Fashion '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Furniture & Décor'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Girls Fashion '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Health & Safety '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Maternity '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Toys '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Coins & Paper Money '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Collectible Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Entertainment '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Historical & Political '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Sports '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Stamps '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Camera, Video & Surveillance '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Car Electronics & GPS '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Cell Phones & Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Computers & Tablets '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Musical Instruments '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Office Electronics & Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Portable Audio '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Software '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Television & Home Theater '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Video Games '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Wearable Technology '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Books '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Magazines '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Movies & TV '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Music '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Novelty Games & Gifts '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Video Games '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Art '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Bath '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Bedding '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Floor Care & Cleaning '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Furniture '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Heating & Cooling '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home Appliances '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home Décor '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Kitchen & Dining '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Luggage '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Mattresses & Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Office & School Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Patio & Garden '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Storage & Organization '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Alcohol '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Beverages '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Candy & Sweets '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Food '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Household Essentials '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Tobacco '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Bath & Body '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Cosmetics '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Fragrance '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Hair Care '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Health Care '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Men\'s Health & Beauty '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Mobility & Safety '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Oral Care '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Personal Care '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Shaving & Grooming '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Skin Care '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Vitamins & Supplements '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Children\'s Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Diamond Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Fashion Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Fine Metal Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Gemstone & Pearl Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Jewelry Accessories & Storage '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Men\'s Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Watches '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Clothing '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Shoes '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Baby & Kids '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Jewelry '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Kitchen Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Novelty Items '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Photo Prints '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Personalized Bags '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Clothing & Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home Decor '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Stationery '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Photo Books '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Bird Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Cat Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Dog Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Fish Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Reptile & Amphibian Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Small Animal Supplies '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Clothing & Shoes '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Cycling '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Exercise & Fitness '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Fan Shop '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Golf '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Outdoors '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Recreation '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Team Sports '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Intimates '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Maternity Clothing '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Plus Size Clothing '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Accessories '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Clothing '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Shoes '));

        //Service categories
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Beauty & Spas'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Food & Drink'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Health & Fitness '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Home Services'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Food & wine delivery'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Online learning'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Personal Services '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Retail '));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Things To Do'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Hotels'));
        DB::table(Category::TABLE)->insert(array(Category::COLUMN_NAME => 'Refreshments'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Category::TABLE);
    }
}
