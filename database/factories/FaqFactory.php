<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faq;
use App\User;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'user_id' =>User::whereLevel('admin')->first()->id,
        'question'=>PFaker::sentence(),
        'answer'=>PFaker::paragraph()
    ];
});