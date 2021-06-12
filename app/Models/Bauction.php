<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Bauction extends Model
{
    protected $table='bproduct_auction';
    protected $fillable=['auction_id','bproduct_id','number','m_year','fresh','description','tech_file'];

    public function Bproduct(){
        return $this->belongsTo(Bproduct::class);
    }

    public function Auction(){
        return $this->belongsTo(Auction::class);
    }
}
