<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $numbers=10;
        for ($x = 0; $x <= $numbers; $x++) {
            DB::table('categories')->insert([
                'name'=>PFaker::word()
            ]);
        }
    }
}