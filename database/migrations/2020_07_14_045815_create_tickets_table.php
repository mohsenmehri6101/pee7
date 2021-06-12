<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('sender_id')->unsigned();
            $table->bigInteger('reciver_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->text('message');
            $table->integer('seen')->default(0);
        });
    }
    /*
     * $table->foreign('reciver_id')->references('id')->on('users')->onDelete('cascade');
     * $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
     * */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
