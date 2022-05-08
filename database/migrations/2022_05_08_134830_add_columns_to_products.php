<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('carbohydrates_total')->after('fat')->nullable();
            $table->float('na')->after('carbohydrates_total')->nullable();
            $table->float('k')->after('na')->nullable();
            $table->float('ca')->after('k')->nullable();
            $table->float('mg')->after('ca')->nullable();
            $table->float('p')->after('mg')->nullable();
            $table->float('fe')->after('p')->nullable();
            $table->float('i')->after('fe')->nullable();
            $table->float('se')->after('i')->nullable();
            $table->float('vitamin_a')->after('se')->nullable();
            $table->float('vitamin_b1')->after('vitamin_a')->nullable();
            $table->float('vitamin_b2')->after('vitamin_b1')->nullable();
            $table->float('vitamin_c')->after('vitamin_b2')->nullable();
            $table->float('vitamin_d')->after('vitamin_c')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
