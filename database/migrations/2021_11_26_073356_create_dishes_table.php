<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->string('name');
            //$table->integer('id')->unsigned()->default(1);//создание поля для связывания с таблицей dishes_category
            //$table->foreign('id')->references('id')->on('dishes_categories');//создание внешнего ключа для поля 'dishes_category_id', который связан с полем id таблицы 'users'
            $table->bigInteger('dishes_categories_id')->unsigned()->index();
            $table->foreign('dishes_categories_id')->references('id')->on('dishes_categories');

            $table->bigInteger('recipes_collections_id')->unsigned()->index();
            $table->foreign('recipes_collections_id')->references('id')->on('recipes_collections');
            $table->text('description');
            $table->bigInteger('culinary_processings_id')->unsigned()->index();
            $table->foreign('culinary_processings_id')->references('id')->on('culinary_processings');
            $table->double('yield');
            $table->text('dishes_characters');
            $table->integer('techmap_number');
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
        Schema::dropIfExists('dishes');
    }
}
