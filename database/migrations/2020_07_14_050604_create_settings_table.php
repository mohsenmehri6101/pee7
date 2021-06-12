<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            /*// relation by user
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // relation by user*/
            $table->string ('type')->nullable();
            $table->string ('title')->nullable();
            $table->text('body')->nullable();
            $table->text('list')->nullable();
            $table->text('images')->nullable();
        });

        //insert login
        $list=['link'=>'link'];
        $setting=\App\Models\Setting::create([
            'type'=>'login',
            'images'=>'info_graphic_1.svg',
            'list'=>$list
        ]);
        $setting=\App\Models\Setting::create([
            'type'=>'register',
            'images'=>'info_graphic_1.svg',
            'list'=>$list
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
