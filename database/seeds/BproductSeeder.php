<?php

use App\Bproduct;
use App\Category;
use App\Unit;
use App\User;
use Illuminate\Database\Seeder;

class BproductSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $numbers=10;
        for ($x = 0; $x <= $numbers; $x++)
        {
            $bproduct = Bproduct::create ([
                'name' => PFaker::firstname(),
                'code' => $faker->postcode,
                'brand' => PFaker::word(),
                'category_id' =>Category::all()->random()->id,
                'description' => PFaker::sentence(),
                'technical' => PFaker::sentence(),
                'unit_id' => Unit::all()->random()->id
            ]);
        }

    }
}
