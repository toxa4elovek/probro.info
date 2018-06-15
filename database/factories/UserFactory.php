<?php

use Faker\Generator as Faker;
use App\Helpers\UserHelper;
use Illuminate\Support\Str;

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

$factory->define(App\Entity\User::class, function (Faker $faker) {
    $active = $faker->boolean();
    $admin  = $faker->boolean(1);
    return [
        'name' => $faker->firstName(),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'status' => ($active) ? UserHelper::STATUS_ACTIVE : UserHelper::STATUS_WAIT,
        'verify_token' => $active ? Str::random() : null,
        'role' => $admin ? UserHelper::ROLE_ADMIN : UserHelper::ROLE_USER
    ];
});
