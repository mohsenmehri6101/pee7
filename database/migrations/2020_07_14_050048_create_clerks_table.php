<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClerksTable extends Migration
{
    public function up()
    {
        Schema::create('clerks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->bigInteger('supplier_id');
            $table->text('about')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('clerks');
    }
}
