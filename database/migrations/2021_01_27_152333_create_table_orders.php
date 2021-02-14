<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->id('orders_id');
            $table->Integer('user_id');
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('note');
            $table->Integer('payment_method');
            $table->string('orders_total');
            $table->Integer('orders_status');
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
        Schema::dropIfExists('tbl_orders');
    }
}
