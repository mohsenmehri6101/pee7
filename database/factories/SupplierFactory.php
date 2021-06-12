<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use App\User;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {

    $companyUser=User::create([
        'name' => PFaker::fullName(),
        'level'=>'supplier',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    return[
        'user_id'=>$companyUser->id,
        'about'=>PFaker::paragraph()
    ];
});