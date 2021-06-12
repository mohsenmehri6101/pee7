<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user
            $table->text('about')->nullable();
        });
        //insert Admin
        \App\User::create([
            'email'=>'mohsen.mehri6101@gmail.com',
            'password'=>Hash::make('12345678'),
            'level'=>'admin',
            'active'=>false,
            'phone'=>'09366246101',
            'name'=>'محسن مهری',
            'username'=>'mohsen6101',
            'image'=>'avator-admin.jpg',
            'created_at' =>$now=now(),
            'updated_at' =>$now,
        ]);
        //09352843550
    }
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
