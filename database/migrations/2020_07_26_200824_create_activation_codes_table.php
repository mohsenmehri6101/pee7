<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationCodesTable extends Migration
{
    public function up()
    {
        Schema::create('activation_codes', function (Blueprint $table) {
            $table->id();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            //code ....
            $table->string('code')->nullable();
            $table->dateTime('expire');
            # $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('activation_codes');
    }
}
