<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class)->create();
    }
}