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
            'path' => 'gallery',
            'name' => 'Arquivo-Test-1',
            'file_name' => '1_6519d53870f85.png',
            'description' => null,
            'mime_type' => 'image/png',
            'extension' => 'png',
            'size' => 1296,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Banner Principal 002',
            'file_name' => '1_6519d9c920f81.jpg',
            'description' => null,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => 422100,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
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
            'path' => 'gallery',
            'name' => 'Arquivo Audio test 001',
            'file_name' => '1_6519eb3be6374.mp3',
            'description' => 'Arquivo .mp3 de teste',
            'mime_type' => 'audio/mpeg',
            'extension' => 'mp3',
            'size' => 3782098,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Test PDF',
            'file_name' => '1_651a1876d2e90.pdf',
            'description' => 'Arquivo de teste PDF',
            'mime_type' => 'application/pdf',
            'extension' => 'pdf',
            'size' => 31122,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
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
            'path' => 'gallery',
            'name' => 'Test DOCX',
            'file_name' => '1_651a1bac40be1.docx',
            'description' => 'Teste de arquivo DOCX',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'extension' => 'docx',
            'size' => 12086,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Test DOC',
            'file_name' => '1_651a1be7686c3.doc',
            'description' => 'Teste de arquivo DOC',
            'mime_type' => 'application/msword',
            'extension' => 'doc',
            'size' => 26624,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Teste XLSX',
            'file_name' => '1_651a1bfe6faff.xlsx',
            'description' => 'Teste de arquivo XSLX',
            'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'extension' => 'xlsx',
            'size' => 8699,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Test XLS',
            'file_name' => '1_651a1c1c1c215.xls',
            'description' => 'Teste de arquivo XLS',
            'mime_type' => 'application/vnd.ms-excel',
            'extension' => 'xks',
            'size' => 17408,
            'created_at' => Carbon::now()
        ]);
        DB::table('files')->insert([
            'path' => 'gallery',
            'name' => 'Pinguins',
            'file_name' => '1_651cc05c34f1d.jpg',
            'description' => null,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'size' => 5315,
            'created_at' => Carbon::now()
        ]);
    }
}
