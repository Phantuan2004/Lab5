<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->text(255),
                'poster' => 'https://www.elleman.vn/app/uploads/2022/11/20/218028/phim-hanh-dong_elleman.jpg',
                'intro' => $faker->text(255),
                'release_date' => $faker->dateTime(),
                'genre_id' => rand(1, 5)
            ]);
        }
    }
}
