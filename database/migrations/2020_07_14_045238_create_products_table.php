<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('brand')->nullable();
            $table->string('price')->nullable();
            $table->string('file')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->boolean('state')->default(1);
            $table->boolean('confirm')->default(1);// 1:true   ,   0:false
            //$table->boolean('block')->default(0);// 1:true   ,   0:false
            $table->boolean('delete')->default(0);// 1:true   ,   0:false
            $table->integer('delivery')->default(0);
            /*
             * 0 = null
             * 1 = درب کارخانه
             * 2 = نزدیک ترین نمایندگی
             * 3 = ارسال با پست (هزینه پست توسط مشتری)
             * 4 = ارسال با پست ( هزینه پست توسط کارخانه/شرکت)
             * */
            $table->text('description')->nullable();
            $table->text('technical')->nullable();
            //f key
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('bproduct_id')->nullable();
            $table->timestamp('expire_date')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
