<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'Jurídico',
            'description' => 'Departamento Jurídico',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Saúde e condições de trabalho',
            'description' => 'Departamento da Saúde e condições de trabalho',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Juventude e Gênero',
            'description' => 'Departamento da Juventude e Gênero',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Diversidade e Combate ao Racismo',
            'description' => 'Departamento da Diversidade e Combate ao Racismo',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Esporte e Lazer',
            'description' => 'Departamento do Esporte e Lazer',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Cultura e Sustentabilidade',
            'description' => 'Departamento da Cultura e Sustentabilidade',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Aposentados e Seguridade Social',
            'description' => 'Departamento de Aposentados e Seguridade Social',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Formação',
            'description' => 'Departamento de Formação',
            'created_at' => Carbon::now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Financeiras e terceirizados do ramo financeiro',
            'description' => 'Departamento das Financeiras e terceirizados do ramo financeiro',
            'created_at' => Carbon::now()
        ]);
    }
}
