<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\AdvertImage;
use App\Models\Advert;

class CreateAdvertImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(AdvertImage::TABLE, function (Blueprint $table) {
            $table->increments(AdvertImage::COLUMN_ID);
            $table->string(AdvertImage::COLUMN_IMAGE_NAME);
            $table->unsignedInteger(AdvertImage::COLUMN_ADVERT_ID);
            $table->timestamps();

            $table->foreign(AdvertImage::COLUMN_ADVERT_ID)->references(Advert::COLUMN_ID)->on(Advert::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Advert::TABLE);
    }
}
