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
            $table->string('status');
            //$table->integer('cart_id');
            //$table->foreign('cart_id')->references('id')->on('carts');
            //$table->integer('customer_id');
            //$table->foreign('customer_id')->references('id')->on('users');
            //$table->integer('payment_id');
            //$table->foreign('payment_id')->references('id')->on('payments');
            $table->decimal('Total_Amount');
            $table->timestamps();
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
