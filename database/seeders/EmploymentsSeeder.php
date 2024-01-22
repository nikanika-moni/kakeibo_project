<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('employments')->insert([
            ['employment' => '正社員', 'created_at' => $now, 'updated_at' => $now],
            ['employment' => '個人事業主', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'その他', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
