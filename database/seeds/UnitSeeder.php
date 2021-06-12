<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(Faker\Generator $faker)
    {
        $numbers=10;
        for ($x = 0; $x <= $numbers; $x++) {
            DB::table('units')->insert([
                'name'=>PFaker::word()
            ]);
        }
    }
}