<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dropdowns\UserType;
use Faker\Generator as Faker;

$factory->define(UserType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
		'updated_at' => $faker->dateTimeBetween('-13 days', '+0 days'),
		'created_at' => $faker->dateTimeBetween('-15 days', '-14 days')
    ];
});
