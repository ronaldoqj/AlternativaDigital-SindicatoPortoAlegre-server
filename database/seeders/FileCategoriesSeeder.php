<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FileCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('file_categories')->insert([
            'id' => 1,
            'name' => 'News',
            'description' => 'Categorias das noticias',
            'created_at' => Carbon::now()
        ]);
        DB::table('file_categories')->insert([
            'id' => 2,
            'name' => 'Video',
            'description' => 'Categorias das videos',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('file_categories')->insert([
            'id' => 3,
            'name' => 'Campaign',
            'description' => 'Categorias das campanhas',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('file_categories')->insert([
            'id' => 4,
            'name' => 'Agenda',
            'description' => 'Categorias das agendas',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('file_categories')->insert([
            'id' => 5,
            'name' => 'Acordos e convenções',
            'description' => 'Categorias dos acordos e convenções',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('file_categories')->insert([
            'id' => 6,
            'name' => 'Editais',
            'description' => 'Categorias dos editais',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('file_categories')->insert([
            'id' => 7,
            'name' => 'NewsTextEditor',
            'description' => 'Categorias dos editais para o componente editor de texto',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('file_categories')->insert([
            'id' => 8,
            'name' => 'AgendaTextEditor',
            'description' => 'Categorias dos editais para o componente editor de texto',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('file_categories')->insert([
            'id' => 9,
            'name' => 'Publicações',
            'description' => 'Categorias das publicações',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('file_categories')->insert([
            'id' => 10,
            'name' => 'Departamentos',
            'description' => 'Categorias dos departamentos',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('file_categories')->insert([
            'id' => 11,
            'name' => 'DepartamentTextEditor',
            'description' => 'Categorias dos departamentos para o componente editor de texto',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
    }
}
