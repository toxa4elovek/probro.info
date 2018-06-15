<?php

use Faker\Generator as Faker;
use App\Entity\Post\Category;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->unique()->text(10),
        'slug' => Str::slug($name),
        'parent_id' => null
    ];
});
