<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->string('title');
            $table->text('images');
            $table->text('description');
        });

        //PivotTable Auction and BaseProduct
        Schema::create('bproduct_auction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('auction_id')->unsigned();
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->bigInteger('base_product_id')->unsigned();
            $table->foreign('base_product_id')->references('id')->on('base_products')->onDelete('cascade');

            $table->integer('number')->nullable();
            $table->text('description');
            $table->text('tech_file');
            $table->string('m_year')->nullable();
            $table->boolean('fresh')->nullable();//1 : new , 0 : old
            $table->timestamps();

        });
        //PivotTable Auction and BaseProduct
    }
    public function down()
    {
        Schema::dropIfExists('bproduct_auction');
        Schema::dropIfExists('auctions');
    }
}
