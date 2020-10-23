<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'icon' => Str::random(4),
        'description' => Str::random(20),
    ];
});
