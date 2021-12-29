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
        $table->engine = 'InnoDB';
          $table->bigIncrements('order_id');
          //$table->integer('item_id')-> unsigned();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('item_id');
          $table->integer('rate');
          $table->integer('qty');
          $table->timestamp('date');



      });

      Schema::table('orders', function($table)
      {
        //$table->foreign('item_id')->references('item')->on('item_id')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('item_id')->references('item_id')->on('item');
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
