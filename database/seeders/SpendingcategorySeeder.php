<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spending_categories')->insert([
            ['name' => '交際費', 'tag_num' => 1],
            ['name' => '交通費', 'tag_num' => 1],
            ['name' => '食費', 'tag_num' => 1],
            ['name' => '互楽', 'tag_num' => 1],
            ['name' => '携帯料金', 'tag_num' => 1],
            ['name' => 'その他（毎月発生する支出）', 'tag_num' => 1],
            ['name' => 'その他（不定期に発生する支出）', 'tag_num' => 2],
        ]);
    }
}
