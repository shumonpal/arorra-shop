<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('brand_id')->unsigned()->index('brands');
            $table->integer('category_id')->unsigned()->index('categories');
            $table->integer('subcategory_id')->unsigned()->index('subcategories');
            $table->string('price');
            $table->string('up_price')->nullable();
            $table->text('descp');
            $table->integer('composition_id')->unsigned()->index('compositions');
            $table->tinyInteger('is_featured')->default(0)->nullable();
            $table->tinyInteger('is_discount')->default(0)->nullable();
            $table->integer('in_stock')->default(0)->nullable();
            $table->string('banner_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('composition_id')->references('id')->on('compositions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
