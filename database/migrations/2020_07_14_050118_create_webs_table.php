<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWebsTable extends Migration
{
    public function up()
    {
        Schema::create('webs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->nullable();
            $table->string ('name')->nullable();
            $table->string ('mobile')->nullable();
            $table->string ('phone')->nullable();
            $table->string ('telegram')->nullable();
            $table->string ('instagram')->nullable();
            $table->string ('logo')->nullable();
            $table->string ('facebook')->nullable();
            $table->string ('url')->nullable();
            $table->string ('manage')->nullable();
            $table->string ('fax')->nullable();
            $table->text ('about')->nullable();
            $table->text ('map_link')->nullable();
            $table->text ('title')->nullable();
            $table->text ('map_img')->nullable();
            $table->text ('tags')->nullable();
            $table->text ('address')->nullable();
        });
        // insert one column
        $web=\App\Models\Web::create([
            'email'=>'email@gmail.com',
            'name'=>'name',
            'mobile'=>'mobile',
            'phone'=>'123456789',
            'telegram'=>'@telegram',
            'instagram'=>'@instagram',
            'logo'=>'logodefault.png',
            'facebook'=>'faceboo',
            'url'=>'supsid.ir',
            'manage'=>'manage',
            'fax'=>'123456789',
            'about'=>'about',
            'map_link'=>'map_link',
            'title'=>'supsid',
            'map_img'=>'map_img',
            'tags'=>'tags',
            'address'=>'address'
        ]);
        // insert one column
    }
    public function down()
    {
        Schema::dropIfExists('webs');
    }
}
