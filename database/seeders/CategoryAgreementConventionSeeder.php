<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryAgreementConventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Financeiras',
            'description' => 'Financeiras',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Companhia Província',
            'description' => 'Companhia Província',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Companhia Hipotecária Piratini',
            'description' => 'Companhia Hipotecária Piratini',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Banco Topázio',
            'description' => 'Banco Topázio',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Portocred',
            'description' => 'Portocred',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Banco Safra',
            'description' => 'Banco Safra',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Sicredi',
            'description' => 'Sicredi',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'BRDE',
            'description' => 'BRDE',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Santander 2020 - 2022',
            'description' => 'Santander 2020 - 2022',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Santander',
            'description' => 'Santander',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Caixa',
            'description' => 'Caixa',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Banco do Brasil',
            'description' => 'Banco do Brasil',
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'Banco da Província',
            'description' => 'Banco da Província',
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => 'BADESUL',
            'description' => 'BADESUL',
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => '2020 - 2022',
            'description' => '2020 - 2022',
            'created_at' => Carbon::now()->addSecond(15)
        ]);
        DB::table('category_agreement_conventions')->insert([
            'name' => '2022 - 2024',
            'description' => '2022 - 2024',
            'created_at' => Carbon::now()
        ]);
    }
}
