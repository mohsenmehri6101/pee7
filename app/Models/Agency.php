<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Agency extends Model
{
    protected $fillable=['location_id','contact_id','user_id','management','description','code_agency'];
    public $timestamps=false;
    public function Location(){
        return $this->hasOne(Location::class);
    }
    public function Contact(){
        return $this->hasOne(Contact::class);
    }
}
