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
        DB::table('income_attribute')->insert([
            ['attribute' => '毎月の収入', 'created_at' => $now, 'updated_at' => $now],
            ['attribute' => '臨時の収入', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
