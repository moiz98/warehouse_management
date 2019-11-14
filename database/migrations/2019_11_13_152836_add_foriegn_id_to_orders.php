<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiegnIdToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function($table) {
            $table->integer('user_id')->unsigned()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cart_id')->unsigned()->after('user_id');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->integer('payment_id')->unsigned()->after('cart_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function($table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['cart_id']);
            $table->dropColumn('cart_id');
            $table->dropForeign(['payment_id']);
            $table->dropColumn('payment_id');
        });
    }
}