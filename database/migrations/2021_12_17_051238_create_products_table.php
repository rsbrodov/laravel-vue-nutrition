<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->bigInteger('products_categories_id')->unsigned()->index();
            $table->foreign('products_categories_id')->references('id')->on('products_categories');
            $table->bigInteger('products_subcategories_id')->unsigned()->index();
            $table->foreign('products_subcategories_id')->references('id')->on('products_subcategories');
            $table->double('sort');
            $table->double('water');
            $table->double('protein');
            $table->double('fat');
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
        Schema::dropIfExists('products');
    }
}
