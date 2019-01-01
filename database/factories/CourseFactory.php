<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Course::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    $end_at = $faker->dateTimeThisMonth();
    $start_at = $faker->dateTimeThisYear($end_at);
    $categories = [
        '经济管理', '计算机', '外语', '文学历史', '医药卫生', '哲学', '艺术设计', '工学', '理学'
    ];
    $banners = [
        'http://edu-image.nosdn.127.net/DD0FF498C9D1BF20F09D37D8F81FDAAF.bmp?imageView&type=jpeg&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/799FEC5422AA2C1F0B225C21F4E5EBBC.jpg?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/80ABFBFDA8AEDE31CD61B5403A13D12E.png?imageView&thumbnail=426y240&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/99AC2ED67555A6FA4B9C432AF90D0F4B.jpg?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/5CB8F3942970394ABDA9D658DECDAA6B.jpg?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/A82C8363EB8AFC1F565039699CFC2807.png?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/3A29C125FE9F63E9E7F8080CC34D1D09.jpg?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/C39CD4C75600AAB7F3AD5ED8CC187CE8.jpg?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/4A3EDEF4424623A05CC977A6B8598A89.jpg?imageView&thumbnail=426y240&quality=100&thumbnail=223x125&quality=100',
        'http://edu-image.nosdn.127.net/7A6770B2E365F4134F6845249A1E1939.PNG?imageView&thumbnail=510y288&quality=100&thumbnail=223x125&quality=100',
    ];

    return [
        'name' => $sentence,
        'excerpt' => $sentence,
        'instructor' => $faker->name . ' ' . $faker->name,
        'body' => $faker->text(),
        'start_at' => $start_at,
        'end_at' => $end_at,
        'banner' => $faker->randomElement($banners),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
