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
            'password' => Hash::make('Master123!@##'),
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'profile' => 'administrator',
            'email' => 'administrator@administrator.com',
            'password' => Hash::make('Master!@#123'),
            'created_at' => Carbon::now()->addSecond(2)
        ]);

        DB::table('users')->insert([
            'name' => 'Normal',
            'profile' => 'normal',
            'email' => 'normal@normal.com.br',
            'password' => Hash::make('Master!@#@@'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);

        /**
         * Usuários do cliente
         */

        //  (51)992372207
        DB::table('users')->insert([
            'name' => 'Aline Adolphs',
            'profile' => 'normal',
            'email' => 'alinedolphs@gmail.com',
            'password' => Hash::make('ALINE01122023#aline'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);

        // (51)99920-6484
        DB::table('users')->insert([
            'name' => 'Amanda Zulke',
            'profile' => 'normal',
            'email' => 'amanda@sindbancarios.org.br',
            'password' => Hash::make('AMANDA01122023#amanda'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);

        // (51)99689-7645
        DB::table('users')->insert([
            'name' => 'Camila Kila',
            'profile' => 'normal',
            'email' => 'camila@sindbancarios.org.br',
            'password' => Hash::make('CAMILA01122023#camila'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);

        // (51)997860085
        DB::table('users')->insert([
            'name' => 'Laís Escher',
            'profile' => 'normal',
            'email' => 'soulaisescher@gmail.com',
            'password' => Hash::make('LAIS01122023#lais'),
            'created_at' => Carbon::now()->addSecond(3)
        ]);
    }
}
