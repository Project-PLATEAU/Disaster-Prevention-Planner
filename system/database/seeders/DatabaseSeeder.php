<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id'       => '728471375978c3cbcef1300ae948fd1d678f0bf0c8d9c',
                'email'         => 'sample@test.com',
                'password'      => Hash::make('sanukishiPW'),
                'role'          => 'member',
                'name'          => 'テストユーザ',
                'address'       => '香川県さぬき市大川町南川1309',
                'area_list_id'  => '2',
            ],
            [
                'user_id'       => 'cbb154f3543b36b5398947321f556f69678f087157f9b',
                'email'         => 'bousai@test.com',
                'password'      => Hash::make('sanukishiPW'),
                'role'          => 'org',
                'name'          => '自主防災組織',
                'address'       => '香川県さぬき市大川町南川1309',
                'area_list_id'  => '2',
            ],
            [
                'user_id'       => 'bea99b1b660bbc9fddfcded4df3fc3ae678f087725ee5',
                'email'         => 'gov@test.com',
                'password'      => Hash::make('sanukishiPW'),
                'role'          => 'gov',
                'name'          => '自治体',
                'address'       => '香川県さぬき市志度5385-8',
                'area_list_id'  => '1',
            ]
        ]);
    }
}
