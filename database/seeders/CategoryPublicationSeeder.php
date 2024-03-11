<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryPublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('category_publications')->insert([
            'name' => '2013...',
            'description' => '2013...',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2014',
            'description' => '2014',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2015',
            'description' => '2015',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2016',
            'description' => '2016',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2017',
            'description' => '2017',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2018',
            'description' => '2018',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2019',
            'description' => '2019',
            'created_at' => Carbon::now()->addSecond(7)
        ]);

        DB::table('category_publications')->insert([
            'name' => '2020',
            'description' => '2020',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2021',
            'description' => '2021',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2022',
            'description' => '2022',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2023',
            'description' => '2023',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('category_publications')->insert([
            'name' => '2024',
            'description' => '2024',
            'created_at' => Carbon::now()->addSecond(12)
        ]);
    }
}
