<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ronaldo Quionha de Jesus',
            'profile' => 'master',
            'email' => 'developer.ronaldoqj@gmail.com',
            'password' => Hash::make('Master123#'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Marcelo Silveira de Almeida',
            'profile' => 'master',
            'email' => 'marcelo.almeida@alternativadigital.com.br',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'profile' => 'administrator',
            'email' => 'administrator@administrator.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()->addSecond(2)
        ]);

        DB::table('users')->insert([
            'name' => 'Normal',
            'profile' => 'normal',
            'email' => 'normal@normal.com.br',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);
    }
}
