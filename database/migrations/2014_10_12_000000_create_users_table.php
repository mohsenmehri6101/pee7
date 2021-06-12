<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('notification')->default('["telegram","email","database"]');
            # sms telegram email database
            $table->boolean('active')->default(false);
            $table->boolean('completeInfo')->default(false);
            $table->string('level')->default('user');//admin,company,supplier,clerk,person
            $table->string('image')->default('user-avator.jpg');
            $table->boolean('is_ban')->default(0);
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
