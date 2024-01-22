<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('cars')->insert([
            ['possession' => 'あり', 'created_at' => $now, 'updated_at' => $now],
            ['possession' => 'なし', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
