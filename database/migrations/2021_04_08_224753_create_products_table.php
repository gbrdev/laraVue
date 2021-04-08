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
            //..creates an id field already as primary key
            $table->id();
            //..creates a string field with length 100
            $table->string('name', 100);
            //..creates a string field with length 100
            $table->string('category', 100);
            //creates an integer field
            $table->integer('value');
            //..generates two time stamp fields to control changing
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
