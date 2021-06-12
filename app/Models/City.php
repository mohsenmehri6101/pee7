<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    protected $fillable = [
        'name', 'id', 'province_id',
    ];
    public $timestamps=false;

    public static function getAllCitiesForProvince($nameProvince){
        $provinceID=Province::getIdProvince($nameProvince);
        return static::where('province_id',$provinceID)->orderBy('id')->get();
    }
}
