<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            'name' => 'Home',
            'code' => 'home',
            'created_at' => Carbon::now()
        ]);
        DB::table('pages')->insert([
            'name' => 'Estúdio Rao',
            'code' => 'estudio_rao',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('pages')->insert([
            'name' => 'Jurídico',
            'code' => 'departamento-juridico',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('pages')->insert([
            'name' => 'Saúde e condições de trabalho',
            'code' => 'departamento-saude_e_condicoes_de_trabalho',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('pages')->insert([
            'name' => 'Juventude e gênero',
            'code' => 'departamento-juventude_e_genero',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('pages')->insert([
            'name' => 'Diversidade e combate ao racismo',
            'code' => 'departamento-diversidade_e_combate_ao_racismo',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('pages')->insert([
            'name' => 'Esporte e lazer',
            'code' => 'departamento-esporte_e_lazer',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('pages')->insert([
            'name' => 'Cultura e sustentabilidade',
            'code' => 'departamento-cultura_e_sustentabilidade',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('pages')->insert([
            'name' => 'Aposentados e seguridade social',
            'code' => 'departamento-aposentados_e_seguridade_social',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('pages')->insert([
            'name' => 'Formação',
            'code' => 'departamento-formacao',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('pages')->insert([
            'name' => 'Financeiras e terceirizados do ramo financeiro',
            'code' => 'departamento-financeiras_e_terceirizados_do_ramo_financeiro',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('pages')->insert([
            'name' => 'Comunicação',
            'code' => 'departamento-comunicacao',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
    }
}
