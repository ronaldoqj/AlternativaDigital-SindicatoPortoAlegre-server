<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(FileCategoriesSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(BankNewsSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(DepartmentNewsSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(CategoryAgreementConventionSeeder::class);
        $this->call(CategoryPublicNoticeSeeder::class);
        $this->call(CategoryPublicationSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(PageVideoSeeder::class);
    }
}
