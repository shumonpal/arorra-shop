<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_content', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('order_id')->unsigned()->index('orders');
            $table->integer('product_id');
            $table->string('price');
            $table->string('qty');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_content');
    }
}
