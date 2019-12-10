<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
	$gender = $faker->randomElements([0, 1])[0];
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'gender' => $gender,
    ];
});
