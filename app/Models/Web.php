<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $fillable=
    [
        'email','name','mobile','phone',
        'telegram','instagram','logo','facebook',
        'url','manage','fax','about','map_link','title',
        'map_img','tags','address'
    ];
}
