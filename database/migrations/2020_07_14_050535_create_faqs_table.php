<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->text('question');
            $table->text('answer');
            $table->string('tags')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('category')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
