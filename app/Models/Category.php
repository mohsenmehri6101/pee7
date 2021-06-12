<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $fillable = ['name', 'id', 'subcategories_id'];
    public $timestamps=false;
}
