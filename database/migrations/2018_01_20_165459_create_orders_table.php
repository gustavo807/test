<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('order_date');
            $table->string('amount');

            $table->integer('cust_id')->unsigned();
            $table->foreign('cust_id')
                  ->references('id')->on('customer')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('salesperson_id')->unsigned();
            $table->foreign('salesperson_id')
                  ->references('id')->on('salesperson')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
