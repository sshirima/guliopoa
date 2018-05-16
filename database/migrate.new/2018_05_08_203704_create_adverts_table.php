<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Advert;
use App\Models\Merchant;
use App\Models\Admin;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Advert::TABLE, function (Blueprint $table) {
            $table->increments(Advert::COLUMN_ID);
            $table->string(Advert::COLUMN_TITLE);
            $table->text(Advert::COLUMN_DESCRIPTION);
            $table->date(Advert::COLUMN_EXPIRE_DATE);
            $table->enum(Advert::COLUMN_ADVERT_TYPE,Advert::ENUM_ADVERT_TYPES);
            $table->boolean(Advert::COLUMN_IS_APPROVED)->default(false);
            $table->date(Advert::COLUMN_APPROVED_DATE)->nullable();
            $table->unsignedInteger(Advert::COLUMN_APPROVED_BY);
            $table->unsignedInteger(Advert::COLUMN_MERCHANT_ID)->unsigned();
            $table->timestamps();

            $table->foreign(Advert::COLUMN_MERCHANT_ID)->references(Merchant::COLUMN_ID)->on(Merchant::TABLE);
            $table->foreign(Advert::APPROVED_BY)->references(Admin::COLUMN_ID)->on(Admin::TABLE);
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
