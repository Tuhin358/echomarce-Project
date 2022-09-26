<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {

            $table->bigIncrements(column:'id');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string(column:'name');
            $table->string(column:'description');
            $table->boolean(column:'status');
            $table->timestamps();



            // $table->bigIncrements(column:'id');
            // $table->unsignedBigInteger(column:'cat_id');
            // $table->foreign(columns:'cat_id')->references(columns:'id')->on(table:'categories')->onUpdate(action:'cascade')->onDelete(action:'cascade');
            // $table->string(column:'name');
            // $table->string(column:'description');
            // $table->boolean(column:'status')->default(value:1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
