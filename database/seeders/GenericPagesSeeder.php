<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GenericPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('generic_pages')->insert([
            'id' => 1,
            'group_page' => 'department',
            'page' => 'juridico',
            'title' => '',
            'created_at' => Carbon::now()
        ]);
        DB::table('generic_pages')->insert([
            'id' => 2,
            'group_page' => 'department',
            'page' => 'saude_e_condicoes_de_trabalho',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 3,
            'group_page' => 'department',
            'page' => 'juventude_e_genero',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 4,
            'group_page' => 'department',
            'page' => 'diversidade_e_combate_ao_racismo',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 5,
            'group_page' => 'department',
            'page' => 'esporte_e_lazer',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 6,
            'group_page' => 'department',
            'page' => 'cultura_e_sustentabilidade',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 7,
            'group_page' => 'department',
            'page' => 'aposentados_e_seguridade_social',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 8,
            'group_page' => 'department',
            'page' => 'formacao',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 9,
            'group_page' => 'department',
            'page' => 'financeiras_e_terceirizados_do_ramo_financeiro',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 10,
            'group_page' => 'department',
            'page' => 'comunicacao',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(9)
        ]);

        DB::table('generic_pages')->insert([
            'id' => 11,
            'group_page' => 'service',
            'page' => 'espaco_casa_dos_bancarios',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 12,
            'group_page' => 'service',
            'page' => 'convenios',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 13,
            'group_page' => 'service',
            'page' => 'arquivo_historico',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 14,
            'group_page' => 'service',
            'link' => 'https://portal.sindbancarios.org.br',
            'page' => 'portal_do_associado',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('generic_pages')->insert([
            'id' => 15,
            'group_page' => 'service',
            'page' => 'juridico',
            'title' => '',
            'created_at' => Carbon::now()->addSecond(14)
        ]);
    }
}
