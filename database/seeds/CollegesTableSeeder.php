<?php

use Illuminate\Database\Seeder;
use App\Models\College;
use App\Models\User;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);
        $i = 1;

        $badges = [
            'https://gss1.bdstatic.com/9vo3dSag_xI4khGkpoWK1HF6hhy/baike/c0%3Dbaike92%2C5%2C5%2C92%2C30/sign=92dd7c32c88065386fe7ac41f6b4ca21/fd039245d688d43f865a688e7f1ed21b0ff43bde.jpg',
            'https://upload.wikimedia.org/wikipedia/zh/thumb/4/44/MIT_Seal.svg/320px-MIT_Seal.svg.png',
            'https://upload.wikimedia.org/wikipedia/zh/thumb/6/6e/Harvard_Wreath.svg/800px-Harvard_Wreath.svg.png',
            'https://upload.wikimedia.org/wikipedia/zh/thumb/e/ec/Tsinghua_University_Logo.svg/800px-Tsinghua_University_Logo.svg.png',
            'https://upload.wikimedia.org/wikipedia/zh/thumb/6/64/USTC_logo_2008.svg/800px-USTC_logo_2008.svg.png',
            'https://upload.wikimedia.org/wikipedia/zh/f/f5/Ocean_University_of_China.png',
            'https://upload.wikimedia.org/wikipedia/zh/3/3d/Scut_logo.jpg',
        ];

        $colleges = factory(College::class)->times(35)->make()->each(function ($college, $index)
            use ($faker, &$i, $badges)
        {
            $college->badge = $faker->randomElement($badges);
            $college->user_id = $i;
            User::find($i++)->assignRole('College');
        });

        // 将数据集合转换为数组，并插入到数据库中
        College::insert($colleges->toArray());

        $college = College::first();
        $college->badge = $badges[0];
        $college->region = "广东东莞";
        $college->address = "麻涌镇沿江西一路7号";
        $college->tel = '0769-82676817';
        $college->introduction = '中山大学新华学院是一所经国家教育部批准设立，涵盖文、理、医、工、经、管、法、艺等多科性应用型开放式的全日制普通高等院校。';
        $college->save();
    }
}
