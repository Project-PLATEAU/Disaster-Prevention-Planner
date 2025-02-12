<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class initMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('area_masters')->insert([
            ['name' => '井戸'],
            ['name' => '自然災害伝承碑'],
        ]);

        DB::table('carry_type_masters')->insert([
            ['name' => '食料と飲料水'],
            ['name' => '医薬品と救急セット'],
            ['name' => '衛生用品'],
            ['name' => '衣類と防寒具'],
            ['name' => '通信・照明手段'],
            ['name' => '書類'],
            ['name' => 'お金'],
            ['name' => 'その他'],
        ]);

        DB::table('carry_item_masters')->insert([
            ['name' => '食料', 'carry_type_master_id' => '1'],
            ['name' => '飲料水', 'carry_type_master_id' => '1'],
            ['name' => '乳児用ミルク', 'carry_type_master_id' => '1'],
            ['name' => '常備薬', 'carry_type_master_id' => '2'],
            ['name' => '救急セット', 'carry_type_master_id' => '2'],
            ['name' => '体温計', 'carry_type_master_id' => '2'],
            ['name' => 'メガネ・コンタクトレンズ', 'carry_type_master_id' => '3'],
            ['name' => 'ティッシュ', 'carry_type_master_id' => '3'],
            ['name' => 'ビニール袋', 'carry_type_master_id' => '3'],
            ['name' => '携帯用トイレ', 'carry_type_master_id' => '3'],
            ['name' => '生理用品', 'carry_type_master_id' => '3'],
            ['name' => 'マスク', 'carry_type_master_id' => '3'],
            ['name' => '消毒液', 'carry_type_master_id' => '3'],
            ['name' => '紙おむつ(大人用)', 'carry_type_master_id' => '3'],
            ['name' => '紙おむつ(乳幼児用)', 'carry_type_master_id' => '3'],
            ['name' => '着替え・下着', 'carry_type_master_id' => '4'],
            ['name' => '雨具', 'carry_type_master_id' => '4'],
            ['name' => '軍手', 'carry_type_master_id' => '4'],
            ['name' => '動きやすい靴', 'carry_type_master_id' => '4'],
            ['name' => 'タオル', 'carry_type_master_id' => '4'],
            ['name' => '毛布', 'carry_type_master_id' => '4'],
            ['name' => '携帯電話', 'carry_type_master_id' => '5'],
            ['name' => 'モバイルバッテリー', 'carry_type_master_id' => '5'],
            ['name' => '携帯ラジオ', 'carry_type_master_id' => '5'],
            ['name' => '懐中電灯', 'carry_type_master_id' => '5'],
            ['name' => '身分証明書', 'carry_type_master_id' => '6'],
            ['name' => '健康保険証', 'carry_type_master_id' => '6'],
            ['name' => '現金', 'carry_type_master_id' => '7'],
            ['name' => '通帳・印鑑', 'carry_type_master_id' => '7'],
            ['name' => '工具セット', 'carry_type_master_id' => '8'],
            ['name' => 'ペット用品', 'carry_type_master_id' => '8'],
        ]);

        DB::table('material_type_masters')->insert([
            ['name' => '食料・飲料水'],
            ['name' => '生活必需品'],
            ['name' => '避難所用資機材'],
        ]);

        DB::table('material_item_masters')->insert([
            ['name' => '主食類(食)', 'material_type_master_id' => '1'],
            ['name' => '粉ミルク(kg)', 'material_type_master_id' => '1'],
            ['name' => '液体ミルク(本)', 'material_type_master_id' => '1'],
            ['name' => '飲料水(L)', 'material_type_master_id' => '1'],
            ['name' => '毛布(枚)', 'material_type_master_id' => '2'],
            ['name' => '簡易ベッド(台)', 'material_type_master_id' => '2'],
            ['name' => 'インフレーターマット(枚)', 'material_type_master_id' => '2'],
            ['name' => '生理用ナプキン(パック)', 'material_type_master_id' => '2'],
            ['name' => '大人用おむつ(枚)', 'material_type_master_id' => '2'],
            ['name' => '子供用おむつ(枚)', 'material_type_master_id' => '2'],
            ['name' => 'パーティション(個)', 'material_type_master_id' => '3'],
            ['name' => '携帯トイレ(回)', 'material_type_master_id' => '3'],
            ['name' => 'ブルーシート(枚)', 'material_type_master_id' => '3'],
            ['name' => '発電機(台)', 'material_type_master_id' => '3'],
            ['name' => 'テント(基)', 'material_type_master_id' => '3'],
            ['name' => 'カセットコンロ(台)', 'material_type_master_id' => '3'],
            ['name' => '寸胴鍋(個)', 'material_type_master_id' => '3'],
            ['name' => 'リアカー(台)', 'material_type_master_id' => '3'],
            ['name' => 'ヘルメット(個)', 'material_type_master_id' => '3'],
            ['name' => 'ガソリン携帯缶(個)', 'material_type_master_id' => '3'],
            ['name' => '灯油缶(個)', 'material_type_master_id' => '3'],
            ['name' => 'バール(個)', 'material_type_master_id' => '3'],
            ['name' => 'ジャッキ(台)', 'material_type_master_id' => '3'],
            ['name' => 'ハンマー(個)', 'material_type_master_id' => '3'],
            ['name' => '石油ストーブ(台)', 'material_type_master_id' => '3'],
            ['name' => '脚立(基)', 'material_type_master_id' => '3'],
            ['name' => 'テーブル(台)', 'material_type_master_id' => '3'],
            ['name' => '椅子(脚)', 'material_type_master_id' => '3'],
        ]);

        DB::table('skill_masters')->insert([
            ['name' => '保健師'],
            ['name' => '助産師'],
            ['name' => '緊急・水難救助資格'],
            ['name' => '建築関係技能者'],
            ['name' => '土木関係技能者'],
            ['name' => '防災士'],
            ['name' => '医者'],
            ['name' => '看護師'],
        ]);
    }
}
