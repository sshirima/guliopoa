<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Currency;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Currency::TABLE, function (Blueprint $table) {
            $table->increments(Currency::COLUMN_ID);
            $table->string(Currency::COLUMN_CODE,10);
            $table->string(Currency::COLUMN_DESCRIPTION)->nullable();
            $table->timestamps();
        });

        DB::table(Currency::TABLE)->insert(array(Currency::COLUMN_CODE => 'TZS',Currency::COLUMN_DESCRIPTION => 'Tanzanian shilling'));
        DB::table(Currency::TABLE)->insert(array(Currency::COLUMN_CODE => 'USD',Currency::COLUMN_DESCRIPTION => 'United States dollar'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Currency::TABLE);
    }
}
