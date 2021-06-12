<?php

use App\Product;
use App\Category;
use App\Unit;
use App\Bproduct;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $bproducts_count=Bproduct::all()->count();
        $suppliers=User::whereLevel('supplier')->pluck('id')->toArray();
        $categories=Category::all()->pluck('id');
        $units=Unit::all()->pluck('id');
        $length_categories=intval(count($categories)-1);
        $length_units=intval(count($units)-1);
        $numbers=10;
        for ($x = 0; $x <= $numbers; $x++)
        {
            $expire=Carbon::now()->addDays(rand( 1,90));
            $product = Product::create([
                'name' => PFaker::lastname(),
                'code' => $faker->postcode,
                'brand' => PFaker::word(),
                'category_id' =>Category::all()->random()->id,
                'description' => PFaker::paragraph(),
                'technical' => PFaker::paragraph(),
                'expire_date'=>$expire,
                'unit_id' =>Unit::all()->random()->id,
                'price'=>$faker->randomNumber(2),
                'amount'=>rand(100,2500),
                'delivery'=>rand(0,4),
                'state'=>rand(0,1),
                'bproduct_id'=>rand(0,Bproduct::all()->count()),
                'user_id'=>User::whereLevel('supplier')->get()->random()->id,
                'delete'=>false,
                'confirm'=>true
            ]);
        }
    }
}