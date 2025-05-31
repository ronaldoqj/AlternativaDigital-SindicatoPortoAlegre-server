<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('category_insurances')->insert([
            'name' => 'Atividade Física',
            'title' => 'Atividade Física',
            'description' => 'Categoria Atividade Física',
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('category_insurances')->insert([
            'name' => 'Saúde e Beleza',
            'title' => 'Saúde e Beleza',
            'description' => 'Categoria Saúde e Beleza',
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('category_insurances')->insert([
            'name' => 'Turismo e Hospedagem',
            'title' => 'Turismo e Hospedagem',
            'description' => 'Categoria Turismo e Hospedagem',
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('category_insurances')->insert([
            'name' => 'Educação',
            'title' => 'Educação',
            'description' => 'Categoria Educação',
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('category_insurances')->insert([
            'name' => 'Outros',
            'title' => 'Outros',
            'description' => 'Categoria Outros',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
    }
}
