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
            $table->bigIncrements(column:'id');
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->integer('br_id');
            $table->integer('unit_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->string(column:'code');
            $table->string(column:'name');
            $table->string(column:'description');
            $table->float(column:'price');
            $table->string(column:'image');
            $table->boolean(column:'status');
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
