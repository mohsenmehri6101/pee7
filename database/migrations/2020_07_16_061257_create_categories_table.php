<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('subcategories_id')->unsigned()->nullable();
            //$table->foreign('subcategories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
