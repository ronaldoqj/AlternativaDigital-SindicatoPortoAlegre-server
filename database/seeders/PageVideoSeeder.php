<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('page_videos')->insert([
            'id' => 1,
            'video_id' => 1,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('page_videos')->insert([
            'id' => 2,
            'video_id' => 1,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('page_videos')->insert([
            'id' => 3,
            'video_id' => 2,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('page_videos')->insert([
            'id' => 4,
            'video_id' => 2,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('page_videos')->insert([
            'id' => 5,
            'video_id' => 3,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('page_videos')->insert([
            'id' => 6,
            'video_id' => 3,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('page_videos')->insert([
            'id' => 7,
            'video_id' => 4,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('page_videos')->insert([
            'id' => 8,
            'video_id' => 4,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('page_videos')->insert([
            'id' => 9,
            'video_id' => 5,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('page_videos')->insert([
            'id' => 10,
            'video_id' => 5,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('page_videos')->insert([
            'id' => 11,
            'video_id' => 6,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('page_videos')->insert([
            'id' => 12,
            'video_id' => 6,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('page_videos')->insert([
            'id' => 13,
            'video_id' => 7,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('page_videos')->insert([
            'id' => 14,
            'video_id' => 7,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        DB::table('page_videos')->insert([
            'id' => 15,
            'video_id' => 8,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(15)
        ]);
        DB::table('page_videos')->insert([
            'id' => 16,
            'video_id' => 8,
            'paga_id' => 2,
            'created_at' => Carbon::now()->addSecond(16)
        ]);
        DB::table('page_videos')->insert([
            'id' => 17,
            'video_id' => 9,
            'paga_id' => 1,
            'created_at' => Carbon::now()->addSecond(17)
        ]);
    }
}
