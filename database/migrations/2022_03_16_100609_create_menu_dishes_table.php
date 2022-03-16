<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_dishes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id')->unsigned()->index();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->integer('cycle');
            $table->integer('days_id');
            $table->integer('nutrition_id');
            $table->bigInteger('dishes_id')->unsigned()->index();
            $table->foreign('dishes_id')->references('id')->on('dishes');
            $table->integer('yield');
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
        Schema::dropIfExists('menu_dishes');
    }
}
