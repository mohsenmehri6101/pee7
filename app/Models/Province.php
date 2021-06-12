<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name', 'id',
    ];
    public $timestamps=false;

    public static function getIdProvince($nameProvince)
    {
        return static::whereName($nameProvince)->first()->id ?? null;
    }
}
