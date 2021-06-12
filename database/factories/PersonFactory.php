<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use App\User;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    $personUser=User::create([
        'name' => PFaker::fullName(),
        'level'=>'person',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    return[
        'user_id'=>$personUser->id,
        'self_id'=>Str::random(5),
        'about'=>PFaker::paragraph()
    ];
});