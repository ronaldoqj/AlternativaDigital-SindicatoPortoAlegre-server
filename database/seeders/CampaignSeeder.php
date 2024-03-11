<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 14,
            'banner_mobile_id' => 14,
            'card_image_id' => 14,
            'draft' => 'n',
            'pin_to_home' => 'n',
            'show_to_home_banner' => 'y',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 15,
            'banner_mobile_id' => 15,
            'card_image_id' => 15,
            'draft' => 'n',
            'pin_to_home' => 'y',
            'show_to_home_banner' => 'n',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 16,
            'banner_mobile_id' => 16,
            'card_image_id' => 16,
            'draft' => 'n',
            'pin_to_home' => 'n',
            'show_to_home_banner' => 'n',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 17,
            'banner_mobile_id' => 17,
            'card_image_id' => 17,
            'draft' => 'n',
            'pin_to_home' => 'y',
            'show_to_home_banner' => 'n',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 18,
            'banner_mobile_id' => 18,
            'card_image_id' => 18,
            'draft' => 'n',
            'pin_to_home' => 'n',
            'show_to_home_banner' => 'n',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
        DB::table('campaigns')->insert([
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
            'banner_desktop_id' => 19,
            'banner_mobile_id' => 19,
            'card_image_id' => 19,
            'draft' => 'n',
            'pin_to_home' => 'y',
            'show_to_home_banner' => 'n',
            'link' => 'https://www.google.com/',
            'target' => '_blank',
            'created_at' => Carbon::now()
        ]);
    }
}
