<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->timestamps();
            //relation by bproduct_auction
            $table->bigInteger('bproduct_auction_id')->unsigned();
            $table->foreign('bproduct_auction_id')->references('id')->on('bproduct_auction')->onDelete('cascade');
            //relation by  bproduct_auction
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->string('price');
            //primary key
            $table->primary(['user_id','bproduct_auction_id','price']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
