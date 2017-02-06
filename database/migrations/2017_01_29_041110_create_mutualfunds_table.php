<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutualfundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutualfunds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fund_name');
            $table->float('net_asset_value');
            $table->date('trade_time');
            $table->float('price_change');
            $table->float('previous_close_price');
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('mutualfunds', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mutualfunds');
    }
}
