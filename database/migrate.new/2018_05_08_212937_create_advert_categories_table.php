<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\AdvertCategory;

class CreateAdvertCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AdvertCategory::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger(AdvertCategory::ADVERT_ID);
            $table->unsignedInteger(AdvertCategory::COLUMN_CATEGORY_ID);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(AdvertCategory::TABLE);
    }
}
