<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
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

$factory->define(Article::class, function (Faker $faker) {
    $title=$faker->text;
    return [
        'title'=>$title,
        'subtitle'=>$faker->text,
        'link'=>$faker->text,
        'slug'=>Str::slug($title),
        'content'=>$faker->realText(5000),
        'emoji'=>$faker->text,
    ];
});
