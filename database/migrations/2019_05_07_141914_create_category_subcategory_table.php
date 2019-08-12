<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategorySubcategoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_subcategory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index('categories');
            $table->integer('subcategory_id')->unsigned()->index('subcategories');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_subcategory');
    }
}
