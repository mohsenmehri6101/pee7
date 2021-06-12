<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'name','code','description','technical','brand',
        'price','amount','delivery','state','file',
        'bproduct_id','category_id','unit_id','user_id',
        'expire_date',
        'confirm','delete'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function Unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
