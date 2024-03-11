<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('files')->insert([
            'id' => 1,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Profile-Default',
            'file_name' => '1_6522cbdf81d6f.jpg',
            'description' => 'Imagem usada para representar algo que não tenha imagem',
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => '90176',
            'deleted_at' => null,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'id' => 2,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Arquivo-Test-1',
            'file_name' => '1_1319d53870f13.jpg',
            'description' => null,
            'mime_type' => 'image/jpg',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'id' => 3,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Arquivo-Test-2',
            'file_name' => '1_6519d53870f85.png',
            'description' => null,
            'mime_type' => 'image/png',
            'extension' => 'png',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(1)
        ]);
        DB::table('files')->insert([
            'id' => 4,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Banner Principal 002',
            'file_name' => '1_6519d9c920f81.jpg',
            'description' => null,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => 422100,
            'created_at' => Carbon::now()->addSecond(2)
        ]);
        DB::table('files')->insert([
            'id' => 5,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Banner Quem Somos 001',
            'file_name' => '1_6519dd4e7a0c0.jpg',
            'description' => null,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => 902939,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'id' => 6,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Arquivo Audio test 001',
            'file_name' => '1_6519eb3be6374.mp3',
            'description' => 'Arquivo .mp3 de teste',
            'mime_type' => 'audio/mpeg',
            'extension' => 'mp3',
            'size' => 3782098,
            'created_at' => Carbon::now()->addSecond(3)
        ]);
        DB::table('files')->insert([
            'id' => 7,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Test PDF',
            'file_name' => '1_651a1876d2e90.pdf',
            'description' => 'Arquivo de teste PDF',
            'mime_type' => 'application/pdf',
            'extension' => 'pdf',
            'size' => 31122,
            'created_at' => Carbon::now()->addSecond(4)
        ]);
        DB::table('files')->insert([
            'id' => 8,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'PDF test',
            'file_name' => '1_651a1b8aede34.pdf',
            'description' => 'Teste de arquivo PDF',
            'mime_type' => 'application/pdf',
            'extension' => 'pdf',
            'size' => 31122,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'id' => 9,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Test DOCX',
            'file_name' => '1_651a1bac40be1.docx',
            'description' => 'Teste de arquivo DOCX',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'extension' => 'docx',
            'size' => 12086,
            'created_at' => Carbon::now()->addSecond(5)
        ]);
        DB::table('files')->insert([
            'id' => 10,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Test DOC',
            'file_name' => '1_651a1be7686c3.doc',
            'description' => 'Teste de arquivo DOC',
            'mime_type' => 'application/msword',
            'extension' => 'doc',
            'size' => 26624,
            'created_at' => Carbon::now()->addSecond(6)
        ]);
        DB::table('files')->insert([
            'id' => 11,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Teste XLSX',
            'file_name' => '1_651a1bfe6faff.xlsx',
            'description' => 'Teste de arquivo XSLX',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'extension' => 'xlsx',
            'size' => 8699,
            'created_at' => Carbon::now()->addSecond(7)
        ]);
        DB::table('files')->insert([
            'id' => 12,
            'category_id' => 1,
            'path' => 'gallery',
            'name' => 'Test XLS',
            'file_name' => '1_651a1c1c1c215.xls',
            'description' => 'Teste de arquivo XLS',
            'mime_type' => 'application/vnd.ms-excel',
            'extension' => 'xks',
            'size' => 17408,
            'created_at' => Carbon::now()->addSecond(8)
        ]);
        DB::table('files')->insert([
            'id' => 13,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => 'Pinguins',
            'file_name' => '1_651cc05c34f1d.jpg',
            'description' => null,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => 5315,
            'created_at' => Carbon::now()->addSecond(9)
        ]);


        DB::table('files')->insert([
            'id' => 14,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '001 Saude Mental',
            'file_name' => '1_65d4d301694fc.jpg',
            'description' => 'Descrição - 001 saude mental',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(10)
        ]);
        DB::table('files')->insert([
            'id' => 15,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '002 Energia Bancaria',
            'file_name' => '1_65d4d3573fab4.jpg',
            'description' => 'Descrição - Energia Bancaria',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(11)
        ]);
        DB::table('files')->insert([
            'id' => 16,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '003 Outubro Rosa',
            'file_name' => '1_65d4d3b42b852.jpg',
            'description' => 'Descrição - Outubro Rosa',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(12)
        ]);
        DB::table('files')->insert([
            'id' => 17,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '004 Doacao Sangue',
            'file_name' => '1_65d4d3fc4e9bf.jpg',
            'description' => 'Descrição - Doacao Sangue',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(13)
        ]);
        DB::table('files')->insert([
            'id' => 18,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '005 Basta',
            'file_name' => '1_65d4d44ccda5b.jpg',
            'description' => 'Descrição - Basta',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(14)
        ]);
        DB::table('files')->insert([
            'id' => 19,
            'category_id' => 3,
            'path' => 'gallery',
            'name' => '006 Banrisul',
            'file_name' => '1_65d4d486bf420.jpg',
            'description' => 'Descrição - Banrisul',
            'mime_type' => 'image/png',
            'extension' => 'jpg',
            'size' => 1296,
            'created_at' => Carbon::now()->addSecond(15)
        ]);
    }
}
