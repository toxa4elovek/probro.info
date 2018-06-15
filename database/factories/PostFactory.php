<?php

use Faker\Generator as Faker;
use App\Entity\Post\Post;
use App\Entity\User;
use App\Helpers\UserHelper;
use App\Entity\Post\Category;
use App\Helpers\PostHelper;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $active = $faker->boolean(70);

    return [
        'owner_id' => $faker->randomElement(User::where('status', UserHelper::STATUS_ACTIVE)->pluck('id')->toArray()),
        'category_id' => $faker->randomElement(Category::all()->pluck('id')->toArray()),
        'title' => $slug = $faker->text(100),
        'slug' => Str::slug($slug),
        'description' => $faker->text(10000),
        'status' => $active ? PostHelper::STATUS_ACTIVE : PostHelper::STATUS_MODERATE,
        'img' => $faker->imageUrl(),
        'published_at' => $active ? Carbon::now()->subDay(random_int(10, 100)) : null,
    ];
});
