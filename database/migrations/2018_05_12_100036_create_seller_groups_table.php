<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SellerGroup;
use App\Models\Admin;

class CreateSellerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SellerGroup::TABLE, function (Blueprint $table) {
            $table->increments(SellerGroup::COLUMN_ID);
            $table->string(SellerGroup::COLUMN_GROUP_NAME);
            $table->string(SellerGroup::COLUMN_DESCRIPTION)->nullable();
        });

        DB::table(SellerGroup::TABLE)->insert(array(SellerGroup::COLUMN_GROUP_NAME => 'Company',SellerGroup::COLUMN_DESCRIPTION => 'This category belongs to company seller'));
        DB::table(SellerGroup::TABLE)->insert(array(SellerGroup::COLUMN_GROUP_NAME => 'Retail Shop',SellerGroup::COLUMN_DESCRIPTION => 'This category belongs to shop keeper'));
        DB::table(SellerGroup::TABLE)->insert(array(SellerGroup::COLUMN_GROUP_NAME => 'Small Scale Business',SellerGroup::COLUMN_DESCRIPTION => 'This category belongs to small scale business'));
        DB::table(SellerGroup::TABLE)->insert(array(SellerGroup::COLUMN_GROUP_NAME => 'Book Store',SellerGroup::COLUMN_DESCRIPTION => 'This category belongs to book sellers'));
        DB::table(SellerGroup::TABLE)->insert(array(SellerGroup::COLUMN_GROUP_NAME => 'Others'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(SellerGroup::TABLE);
    }
}
