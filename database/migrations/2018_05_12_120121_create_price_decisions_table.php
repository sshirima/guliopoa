<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PriceDecision;

class CreatePriceDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PriceDecision::TABLE, function (Blueprint $table) {
            $table->increments(PriceDecision::COLUMN_ID);
            $table->string(PriceDecision::COLUMN_DECISION_CODE)->unique();
            $table->string(PriceDecision::COLUMN_DECISION_NAME);
            $table->string(PriceDecision::COLUMN_DESCRIPTION)->nullable();
        });
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'unit',PriceDecision::COLUMN_DECISION_NAME => 'Unit',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Units'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'kilograms',PriceDecision::COLUMN_DECISION_NAME => 'Kilograms(Kg)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Kilograms(Kg)'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'grams',PriceDecision::COLUMN_DECISION_NAME => 'Grams(g)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Grams(g)'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'square_metres',PriceDecision::COLUMN_DECISION_NAME => 'Square metres(sqm)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Square metres(sqm)'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'metres',PriceDecision::COLUMN_DECISION_NAME => 'Metres(m)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Metres(m)'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'cubic_metres',PriceDecision::COLUMN_DECISION_NAME => 'Cubic metres(cqm)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Cubic metres(cqm)'));
        DB::table(PriceDecision::TABLE)->insert(array(PriceDecision::COLUMN_DECISION_CODE => 'litres',PriceDecision::COLUMN_DECISION_NAME => 'Litres(l)',PriceDecision::COLUMN_DESCRIPTION => 'This will hold product to be sold by Litres(l)'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PriceDecision::TABLE);
    }
}
