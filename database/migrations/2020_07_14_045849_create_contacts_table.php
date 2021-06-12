<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mobiles')->nullable();
            $table->string('phones')->nullable();
            $table->string('telegram')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            //foregin id
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('agency_id')->nullable()->unsigned();
        });
    }
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
