<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Course::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    $end_at = $faker->dateTimeThisMonth();
    $start_at = $faker->dateTimeThisYear($end_at);
    $categories = [
        '经济管理', '计算机', '外语', '文学历史', '医药卫生', '哲学', '艺术设计', '工学', '理学'
    ];
    $types = [
        'abstract', 'business', 'city','people', 'nature', 'technics', 'transport'
    ];

    return [
        'name' => $sentence,
        'excerpt' => $sentence,
        'instructor' => $faker->name . ' ' . $faker->name,
        'body' => $faker->text(),
        'category' => $faker->randomElement($categories),
        'start_at' => $start_at,
        'end_at' => $end_at,
        'banner' => $faker->imageUrl(416, 416, $faker->randomElement($types)),
        'created_at' => now(),
        'updated_at' => now(),
        'status' => '未开始',
    ];
});
