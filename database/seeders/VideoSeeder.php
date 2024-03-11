<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('videos')->insert([
            'id' => 1,
            'image_id' => 25,
            'video' => 'https://youtu.be/DLTpOEA57Ac?si=a2NECKikp7mS6hEJ',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 1',
            'call' => 'Descrição do vídeo 1',
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('videos')->insert([
            'id' => 2,
            'image_id' => 26,
            'video' => 'https://youtu.be/DLTpOEA57Ac?si=a2NECKikp7mS6hEJ',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 2',
            'call' => 'Descrição do vídeo 2',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('videos')->insert([
            'id' => 3,
            'image_id' => 27,
            'video' => 'https://youtu.be/uzpxrx7NZBA?si=OEWkCV2ph7CMhOLt',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 3',
            'call' => 'Descrição do vídeo 3',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('videos')->insert([
            'id' => 4,
            'image_id' => 28,
            'video' => 'https://youtu.be/sXJGoXetz34?si=f8aXRyi8FnulckYH',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 4',
            'call' => 'Descrição do vídeo 4',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('videos')->insert([
            'id' => 5,
            'image_id' => 29,
            'video' => 'https://youtu.be/fGm6YzBrxiI?si=KSLbQG6H7iGPUytb',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 5',
            'call' => 'Descrição do vídeo 5',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('videos')->insert([
            'id' => 6,
            'image_id' => 30,
            'video' => 'https://youtu.be/kzKXywQ5fpw?si=MQIWf3bErDS81hw7',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 6',
            'call' => 'Descrição do vídeo 6',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('videos')->insert([
            'id' => 7,
            'image_id' => 31,
            'video' => 'https://youtu.be/aiQdLP2mBJE?si=Cbhum5huBGJBMUiH',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 7',
            'call' => 'Descrição do vídeo 7',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('videos')->insert([
            'id' => 8,
            'image_id' => 32,
            'video' => 'https://youtu.be/iNSa8oq4vYQ?si=_vlUsmXtgeKhPmKD',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 8',
            'call' => 'Descrição do vídeo 8',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('videos')->insert([
            'id' => 9,
            'image_id' => 33,
            'video' => 'https://youtu.be/TijClV4uHIk?si=v_9tOo1GKkXK-nk6',
            'draft' => 'n',
            'pin_to_home' => 'n',
            'title' => 'Vídeo 9',
            'call' => 'Descrição do vídeo 9',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
    }
}
