<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePermissionsAndRolesTables extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title')->unique();
            $table->string('label')->nullable();
            $table->string('tag')->nullable();
        });
        Schema::create('permission_user' , function(Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['permission_id' , 'user_id']);
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('label')->nullable();
            $table->string('tag')->nullable();
        });
        Schema::create('permission_role' , function(Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['permission_id' , 'role_id']);
        });
        Schema::create('role_user' , function(Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['user_id' , 'role_id']);
        });

        /* create permissions */
        //['name' => 'namePermission', 'label' =>'labelPermission','tag'=>'tagPermission'],
        DB::table('permissions')->insert([
            ['name' => 'show-users', 'title'=>'نمایش کاربران','label' =>'show all Users','tag'=>'admin'],
            ['name' => 'define-user', 'title'=>'تعریف کاربران','label' =>'define user admin','tag'=>'admin'],
            ['name' => 'setting-web', 'title'=>'تنظیمات اصلی سایت','label' =>'change setting in website','tag'=>'admin']
        ]);
        DB::table('roles')->insert([
            ['name' => 'supplier','tag'=>'role'],
            ['name' => 'clerk','tag'=>'role'],
            ['name' => 'admin','tag'=>'role'],
            ['name' => 'person','tag'=>'role'],
            ['name' => 'company','tag'=>'role'],
        ]);
        /* create permissions */
    }

    public function down()
    {
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
}
