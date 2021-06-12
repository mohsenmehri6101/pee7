<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['type','title','body','list','images'];
    protected $casts=['list'=>'array','images'=>'array'];
    /*public function User(){
        return $this->belongsTo(User::class);
    }*/
}
