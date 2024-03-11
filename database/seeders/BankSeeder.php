<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('banks')->insert([
            'name' => 'Banco do Brasil',
            'description' => 'Banco do Brasil - Banco Nacional',
            'created_at' => Carbon::now()
        ]);

        DB::table('banks')->insert([
            'name' => 'Banrisul',
            'description' => 'Banrisul - Banco Rio Grandense',
            'created_at' => Carbon::now()->addSecond(1)
        ]);

        DB::table('banks')->insert([
            'name' => 'Bradesco',
            'description' => 'Bradesco - Banco Privado',
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('banks')->insert([
            'name' => 'Caixa Econômica Federal',
            'description' => 'Caixa Econômica Federal - Banco Federal Nacional',
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('banks')->insert([
            'name' => 'Santander',
            'description' => 'Santander - Banco Privado',
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('banks')->insert([
            'name' => 'Instituições Financeiras',
            'description' => 'Instituições Financeiras - Banco Privado',
            'created_at' => Carbon::now()->addSecond(5)
        ]);

        DB::table('banks')->insert([
            'name' => 'Badesul',
            'description' => 'Banco Badesul',
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('banks')->insert([
            'name' => 'Bancos Privados',
            'description' => 'Bancos Privados',
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('banks')->insert([
            'name' => 'Bancos Públicos',
            'description' => 'Bancos Públicos',
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('banks')->insert([
            'name' => 'BIC Banco',
            'description' => 'BIC Banco',
            'created_at' => Carbon::now()->addSecond(9)
        ]);
        DB::table('banks')->insert([
            'name' => 'BRDE',
            'description' => 'Banco BRDE',
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('banks')->insert([
            'name' => 'Financeiras',
            'description' => 'Financeiras',
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('banks')->insert([
            'name' => 'HSBC',
            'description' => 'Banco HSBC',
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('banks')->insert([
            'name' => 'Itaú',
            'description' => 'Banco Itaú',
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('banks')->insert([
            'name' => 'Mercantil do Brasil',
            'description' => 'Mercantil do Brasil',
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        DB::table('banks')->insert([
            'name' => 'Safra',
            'description' => 'Banco Safra',
            'created_at' => Carbon::now()->addSecond(15)
        ]);
        DB::table('banks')->insert([
            'name' => 'Sicredi',
            'description' => 'Sicredi',
            'created_at' => Carbon::now()->addSecond(16)
        ]);
        DB::table('banks')->insert([
            'name' => 'Outros bancos',
            'description' => 'Outros bancos',
            'created_at' => Carbon::now()->addSecond(17)
        ]);
    }
}
