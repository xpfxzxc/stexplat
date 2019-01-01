<?php

use Illuminate\Database\Seeder;
use App\Models\College;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $college_ids = College::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $courses = factory(Course::class)->times(50)->make()
                    ->each(function ($course)
                        use ($college_ids, $faker)
        {
            $course->college_id = $faker->randomElement($college_ids);
        });

        Course::insert($courses->toArray());
    }
}
