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
            'created_at' => Carbon::now()->addSecond(4)
        ]);

        // (51)99920-6484
        DB::table('users')->insert([
            'name' => 'Amanda Zulke',
            'profile' => 'normal',
            'email' => 'amanda@sindbancarios.org.br',
            'password' => Hash::make('AMANDA01122023#amanda'),
            'created_at' => Carbon::now()->addSecond(5)
        ]);

        // (51)99689-7645
        DB::table('users')->insert([
            'name' => 'Camila Kila',
            'profile' => 'normal',
            'email' => 'camila@sindbancarios.org.br',
            'password' => Hash::make('CAMILA01122023#camila'),
            'created_at' => Carbon::now()->addSecond(6)
        ]);

        // (51)99806-3829
        DB::table('users')->insert([
            'name' => 'Laís Escher',
            'profile' => 'normal',
            'email' => 'lais@sindbancarios.org.br',
            'password' => Hash::make('LA01122023#is'),
            'created_at' => Carbon::now()->addSecond(7)
        ]);

        // (51)980222704
        DB::table('users')->insert([
            'name' => 'Martina Pinheiro',
            'profile' => 'normal',
            'email' => 'martina@sindbancarios.org.br',
            'password' => Hash::make('MAR01122023#pinheiro'),
            'created_at' => Carbon::now()->addSecond(8)
        ]);

        // (51)98402-8358
        DB::table('users')->insert([
            'name' => 'Célio Romeu dos Santos',
            'profile' => 'normal',
            'email' => 'celio@sindbancarios.org.br',
            'password' => Hash::make('CEL01122023#romeu'),
            'created_at' => Carbon::now()->addSecond(9)
        ]);

        // (51)98023-5674 | Gerente administrativo
        DB::table('users')->insert([
            'name' => 'Fabio Girotto Caldas',
            'profile' => 'normal',
            'email' => 'fabio@sindbancarios.org.br',
            'password' => Hash::make('fgc9574#cl'),
            'created_at' => Carbon::now()->addSecond(11)
        ]);

        // (51)99675-3592 | Aux. Administrativo
        DB::table('users')->insert([
            'name' => 'Andressa Mendes da Silva',
            'profile' => 'normal',
            'email' => 'andressa@sindbancarios.org.br',
            'password' => Hash::make('ams7536#sv'),
            'created_at' => Carbon::now()->addSecond(12)
        ]);

        // (51)99806-3829 | Aux. Administrativo
        DB::table('users')->insert([
            'name' => 'Lisandra Salgado Alves',
            'profile' => 'normal',
            'email' => 'lisandra@sindbancarios.org.br',
            'password' => Hash::make('lsa6542#av'),
            'created_at' => Carbon::now()->addSecond(13)
        ]);




        // (51)99291 3385 | Jornalista
        DB::table('users')->insert([
            'name' => 'Dijair Brilhantes Maria',
            'profile' => 'normal',
            'email' => 'dijairbrilhantes@gmail.com',
            'password' => Hash::make('dij9574#mr'),
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        // (51)98224 2724 | Dir. Comunicação
        DB::table('users')->insert([
            'name' => 'Sérgio Hoff',
            'profile' => 'normal',
            'email' => 'sergio@sindbancarios.org.br',
            'password' => Hash::make('sg7536#hf'),
            'created_at' => Carbon::now()->addSecond(15)
        ]);




        // (51) 99591 4933 | Presidente
        DB::table('users')->insert([
            'name' => 'Luciano Fetzner Barcellos',
            'profile' => 'normal',
            'email' => 'luciano@sindbancarios.org.br',
            'password' => Hash::make('lf9853#pr'),
            'created_at' => Carbon::now()->addSecond(16)
        ]);
    }
}
