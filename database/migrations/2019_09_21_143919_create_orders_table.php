<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('payer_id')->nullable();
            $table->integer('user_id');
            $table->string('invoice_id');
            $table->text('invoice_description')->nullable();
            $table->integer('discount')->nullable();
            $table->string('payer_email')->nullable();
            $table->integer('status')->default(0);
            $table->string('pay_method');
            $table->string('shipping_method');
            $table->integer('total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
