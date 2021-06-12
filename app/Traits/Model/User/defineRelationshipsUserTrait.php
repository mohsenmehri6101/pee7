<?php
namespace App\Traits\Model\User;

use App\Models\ActivationCode;
use App\Models\Admin;
use App\Models\Clerk;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Location;
use App\Models\Note;
use App\Models\Person;
use App\Models\Price;
use App\Models\Product;
use App\Models\Supplier;

trait defineRelationshipsUserTrait
{

    public function activationCode(){
        return $this->hasOne(ActivationCode::class);
    }

    public function questions(){
        return $this->hasMany(Faq::class);
    }
    public function prices(){
        return $this->hasMany(Price::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function person(){
        return $this->hasOne(Person::class);
    }
    public function clerk(){
        return $this->hasOne(Clerk::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function company(){
        return $this->hasOne(Company::class);
    }
    public function admin(){
        return $this->hasOne(Admin::class);
    }
    public function supplier(){
        return $this->hasOne(Supplier::class);
    }
    public function location(){
        return $this->hasOne(Location::class);
    }
    public function contact(){
        return $this->hasOne(Contact::class);
    }

    /* public function Backer()
   {
       return $this->hasOne(Backer::class);
   }

    public function Settings(){
        return $this->hasMany(Setting::class);
    }*/

}
