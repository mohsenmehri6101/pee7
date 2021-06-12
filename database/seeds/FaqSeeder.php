<?php

use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{

    public function run()
    {
        $faqs = factory(\App\Faq::class,10)->create();
    }
}
