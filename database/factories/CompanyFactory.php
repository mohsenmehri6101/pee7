<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $companyUser=User::create([
        'name' => PFaker::fullName(),
        'level'=>'company',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
    ]);
    return[
        'user_id'=>$companyUser->id,
        'id_company'=>Str::random(5),
        'id_recording'=>Str::random(5),
        'about'=>PFaker::paragraph()
    ];
});