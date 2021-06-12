<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bproduct extends Model
{
    protected $table="base_products";
    protected $fillable=['name','code','brand','category_id','description','technical','unit_id'];
    // 'technical' = Technical Specifications
    public function Bauction()
    {
        return $this->hasMany(Bauction::class);
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
