<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Advert;
use App\Models\Service;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Service::TABLE, function (Blueprint $table) {
            $table->increments(Service::COLUMN_ID);
            $table->string(Service::COLUMN_SERVICE_NAME);
            $table->string(Service::COLUMN_SERVICE_BRAND)->nullable();
            $table->unsignedinteger(Service::COLUMN_CURRENT_PRICE);
            $table->unsignedinteger(Service::COLUMN_PREVIOUS_PRICE);
            $table->integer(Service::COLUMN_ADVERT_ID)->unsigned();
            $table->timestamps();

            $table->foreign(Service::COLUMN_ADVERT_ID)->references(Advert::COLUMN_ID)->on(Advert::TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Service::TABLE);
    }
}
