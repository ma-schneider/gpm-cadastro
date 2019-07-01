<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    
    $storagePath = storage_path('app/public/photos');
    $file = $faker->image($storagePath, 120, 80);
    $fileParts = explode('/', $file);
    $filePath = 'photos/' . end($fileParts);

    return [
        'name' => $faker->name,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'membership' => $faker->date(),
        'birthday' => $faker->date(),
        'rg' => $faker->randomNumber(8),
        'cpf' => $faker->randomNumber(8),
        'blood' => $faker->randomElement(['A', 'A+', 'B', 'B-']),
        'healthcare' => $faker->randomElement(['Amil', 'Prevent Senior', 'Amesp']),
        'cbm' => $faker->boolean,
        'cbm_institution' => $faker->randomElement(['CAB', 'GPM', 'CEU', 'CABA']),
        'email' => $faker->unique()->safeEmail,
        'photo' => $filePath,
        'number' => $faker->randomNumber(4),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
