<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gennes')->insert([
            ['name' => 'Hành động'],
            ['name' => 'Võ thuật'],
            ['name' => 'Tâm lý'],
            ['name' => 'Tình cảm'],
            ['name' => 'Viễn tưởng']
        ]);
    }
}
