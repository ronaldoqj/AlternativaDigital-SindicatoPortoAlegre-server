<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryPublicNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('category_public_notices')->insert([
            'name' => '2013...',
            'description' => '2013...',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2014',
            'description' => '2014',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2015',
            'description' => '2015',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2016',
            'description' => '2016',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2017',
            'description' => '2017',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2018',
            'description' => '2018',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2019',
            'description' => '2019',
            'created_at' => Carbon::now()->addSecond(7)
        ]);

        DB::table('category_public_notices')->insert([
            'name' => '2020',
            'description' => '2020',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2021',
            'description' => '2021',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2022',
            'description' => '2022',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2023',
            'description' => '2023',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2024',
            'description' => '2024',
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2025',
            'description' => '2025',
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2026',
            'description' => '2026',
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2027',
            'description' => '2027',
            'created_at' => Carbon::now()->addSecond(15)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2028',
            'description' => '2028',
            'created_at' => Carbon::now()->addSecond(16)
        ]);
        DB::table('category_public_notices')->insert([
            'name' => '2029',
            'description' => '2029',
            'created_at' => Carbon::now()->addSecond(17)
        ]);

        DB::table('category_public_notices')->insert([
            'name' => '2030',
            'description' => '2030',
            'created_at' => Carbon::now()->addSecond(18)
        ]);
    }
}
