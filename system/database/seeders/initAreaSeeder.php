<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('area_lists')->insert([
            ['name' => 'さぬき市'],
            ['name' => '南川地区'],
        ]);

        DB::table('address_lists')->insert([
            ['name' => '大川町田面'],
            ['name' => '大川町富田中'],
            ['name' => '大川町富田西'],
            ['name' => '大川町富田東'],
            ['name' => '大川町南川'],
            ['name' => '小田'],
            ['name' => '鴨部'],
            ['name' => '鴨庄'],
            ['name' => '寒川町石田西'],
            ['name' => '寒川町石田東'],
            ['name' => '寒川町神前'],
            ['name' => '志度'],
            ['name' => '昭和'],
            ['name' => '末'],
            ['name' => '造田乙井'],
            ['name' => '造田是弘'],
            ['name' => '造田野間田'],
            ['name' => '造田宮西'],
            ['name' => '多和'],
            ['name' => '津田町津田'],
            ['name' => '津田町鶴羽'],
            ['name' => '長尾西'],
            ['name' => '長尾東'],
            ['name' => '長尾名'],
            ['name' => '前山'],
        ]);
    }
}
