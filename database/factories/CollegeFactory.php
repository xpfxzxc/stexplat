<?php

use Faker\Generator as Faker;

$factory->define(App\Models\College::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    $city = $faker->city;
    return [
        'region' => $city,
        'address' => $city,
        'tel' => $faker->phoneNumber,
        'introduction' => $faker->paragraph,
        'status' => '已审核',
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
