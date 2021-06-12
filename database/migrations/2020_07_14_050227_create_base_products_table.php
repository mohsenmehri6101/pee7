<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseProductsTable extends Migration
{
    public function up()
    {
        Schema::create('base_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->text('technical')->nullable();
            //foregin key
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('base_products');
    }
}
