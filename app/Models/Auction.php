<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable=['images'];
    protected $casts=['images'=>'array'];
    public function Bauction(){
        return $this->hasMany(Bauction::class);
    }

}
