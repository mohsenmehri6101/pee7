<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use App\User;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    $admin=User::create([
        'name' => PFaker::fullName(),
        'level'=>'admin',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)
        ]);
    return[
        'user_id'=>$admin->id,
        'about'=>PFaker::paragraph()
    ];
});