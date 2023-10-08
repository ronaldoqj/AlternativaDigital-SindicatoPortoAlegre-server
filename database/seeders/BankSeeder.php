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
            'name' => 'Instituição Financeira',
            'description' => 'Instituição Financeira - Banco Privado',
            'created_at' => Carbon::now()->addSecond(5)
        ]);
    }
}
