<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorshipSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $now = Carbon::now();
            DB::table('file_categories')->updateOrInsert(
                ['id' => 14],
                ['name' => 'Diretoria', 'description' => 'Fotos da diretoria', 'created_at' => $now, 'updated_at' => $now]
            );

            $categories = [
                ['Presidente', 'Presidência'],
                ['Secretaria geral', 'Secretaria Geral'],
                ['Secretaria executiva', 'Secretaria Executiva'],
                ['Financeiro', 'Financeiro'],
                ['Administrativo', 'Administrativo'],
                ['Comunicação', 'Comunicação'],
                ['Jurídico', 'Jurídico'],
                ['Juventude e Gênero', 'Juventude e Gênero'],
                ['Diversidade e Combate ao Racismo', 'Diversidade e Combate ao Racismo'],
                ['Saúde e Condições de Trabalho', 'Saúde e Condições de Trabalho'],
                ['Esporte e Lazer', 'Esporte e Lazer'],
                ['Cultura e Sustentabilidade', 'Cultura e Sustentabilidade'],
                ['Aposentados e Seguridade Social', 'Aposentados e Seguridade Social'],
                ['Formação', 'Formação'],
                ['Financeiras e Terceirizados do Ramo Financeiro', 'Financeiras e Terceirizados'],
                ['Conselho de Representação em Entidades de Grau Superior', 'Conselheiro'],
                ['Conselho Fiscal', 'Conselho Fiscal']
            ];

            foreach ($categories as $index => [$name, $roleName]) {
                DB::table('director_categories')->updateOrInsert(
                    ['name' => $name],
                    ['role_name' => $roleName, 'display_order' => $index + 1, 'created_at' => $now, 'updated_at' => $now]
                );
            }

            $directors = [
                ['Presidente', 'Luciano', 'Fetzner Barcellos', 'Presidência', 'Banrisul', '001_PRESIDENTE_Luciano.jpg'],
                ['Secretaria geral', 'Sabrina', 'Quinteros Muniz', 'Secretaria Geral', 'Caixa Econômica Federal', '002_Secretaria_Geral_Sabrina.jpg'],
                ['Secretaria geral', 'Mauro', 'Salles', 'Secretaria Geral', 'Santander', '002_Secretaria_Geral_Mauro_sales.jpg'],
                ['Secretaria geral', 'Jailson', 'Bueno Prodes', 'Secretaria Geral', 'Caixa Econômica Federal', '002_Secretaria_Geral_JAILSON.jpg'],
                ['Secretaria executiva', 'Daniela', 'Silva de Souza', 'Secretaria Executiva', 'Itaú', '004_SECRETARIA_EXECUTIVA-DANIELA.jpg'],
                ['Secretaria executiva', 'Luis Gustavo', 'Vargas Soares', 'Secretaria Executiva', 'Bradesco', '004_SECRETARIA_EXECUTIVA-LUIS.jpg'],
                ['Secretaria executiva', 'Rodrigo', 'Pereira Soares', 'Secretaria Executiva', 'Banrisul', '004_SECRETARIA_EXECUTIVA-Rodrigo-Pereira.jpg'],
                ['Financeiro', 'Tiago', 'Vasconcellos Pedroso', 'Financeiro', 'Caixa Econômica Federal', '005_FINANCEIRO-TIAGO.jpg'],
                ['Financeiro', 'Maristela', 'da Rocha', 'Financeiro', 'Caixa Econômica Federal', '005_FINANCEIRO-MARISTELA.jpg'],
                ['Financeiro', 'Rafael', 'Binotto Gomes', 'Financeiro', 'Caixa Econômica Federal', '005_FINANCEIRO-rafael.jpg'],
                ['Administrativo', 'Silvia Regina', 'de Carvalho Chaves', 'Secretaria Geral', 'Banrisul', '003_SECRETARIA_EXECUTIVA-silvia.jpg'],
                ['Administrativo', 'Jorge Luis', 'Consminski Lucas', 'Secretaria Geral', 'Bradesco', '003_administrativo_jorge_lucas.jpg'],
                ['Administrativo', 'Ronaldo', 'Souza Gross', 'Secretaria Geral', 'Bradesco', '003_administrativo_ronaldo_gross.jpg'],
                ['Comunicação', 'Guilherme', 'Daroit', 'Comunicação', 'Banrisul', '007_COMUNICACAO-Guilherme.jpg'],
                ['Comunicação', 'Andrei', 'Freitas Teixeira', 'Comunicação', 'Banco do Brasil', '007_COMUNICACAO-Andrei.jpg'],
                ['Comunicação', 'Pedro', 'Sampaio', 'Comunicação', 'BRDE', '007_COMUNICACAO-Pedro-Sampaio.jpg'],
                ['Jurídico', 'Priscila', 'Aguirres', 'Jurídico', 'Banco do Brasil', '008_JURIDICO-Priscila.jpg'],
                ['Jurídico', 'Jonas', 'Castilhos', 'Jurídico', 'Banrisul', '008_JURIDICO-Jonas.jpg'],
                ['Jurídico', 'Ricardo', 'Stumpf', 'Jurídico', 'Banco do Brasil', '008_JURIDICO-Ricardo.jpg'],
                ['Juventude e Gênero', 'Claudia Stella', 'Rodrigues Santana de Resende', 'Juventude e Gênero', 'Banrisul', '009_JUVENTUDE_GENERO-Claudia.jpg'],
                ['Juventude e Gênero', 'Bianca', 'Garbelini', 'Juventude e Gênero', 'Banco do Brasil', '009_JUVENTUDE_GENERO-Bianca.jpg'],
                ['Juventude e Gênero', 'Fernanda', 'Umsza', 'Juventude e Gênero', 'Banrisul', '009_JUVENTUDE_GENERO-Fernanda.jpg'],
                ['Diversidade e Combate ao Racismo', 'Sandro Artur', 'Ferreira Rodrigues', 'Diversidade e Combate ao Racismo', 'Itaú', '010_DIVERSIDADE_COMBATE_RACISMO-Sandro.jpg'],
                ['Diversidade e Combate ao Racismo', 'Paulo Roberto', 'dos Santos Caetano', 'Diversidade e Combate ao Racismo', 'Caixa Econômica Federal', '010_DIVERSIDADE_COMBATE_RACISMO-Paulo.jpg'],
                ['Diversidade e Combate ao Racismo', 'Thiely', 'Denise Kalil', 'Diversidade e Combate ao Racismo', 'Itaú', '010_DIVERSIDADE_COMBATE_RACISMO-Thielly.jpg'],
                ['Saúde e Condições de Trabalho', 'Jamile', 'Chamun', 'Saúde e Condições de Trabalho', 'Itaú', '011_SAUDE_CONDICOES-Jamile.jpg'],
                ['Saúde e Condições de Trabalho', 'Rodrigo', 'Ambros Rodrigues', 'Saúde e Condições de Trabalho', 'Itaú', '011_SAUDE_CONDICOES-Rodrigo.jpg'],
                ['Saúde e Condições de Trabalho', 'Rosecler', 'de Carvalho', 'Saúde e Condições de Trabalho', 'Bradesco', '011_SAUDE_CONDICOES-Rosecler.jpg'],
                ['Esporte e Lazer', 'Gerson', 'Marques dos Reis', 'Esporte e Lazer', 'Banrisul', '012_ESPORTE_LAZER-Gerson.jpg'],
                ['Esporte e Lazer', 'José Henrique', 'Bielecki Wierzchowski', 'Esporte e Lazer', 'Caixa Econômica Federal', '011_ESPORTE_LAZER-jose-henrique.jpg'],
                ['Esporte e Lazer', 'Gilnei', 'Silva Nunes', 'Esporte e Lazer', 'Banrisul', '012_ESPORTE_LAZER-Gilnei.jpg'],
                ['Esporte e Lazer', 'Carlos Odone', 'Dahlheimer Viale (em memória)', 'Esporte e Lazer', 'Banco do Brasil', '012_ESPORTE_LAZER-Carlos.jpg'],
                ['Cultura e Sustentabilidade', 'Guaracy', 'Padilla Gonçalves', 'Cultura e Sustentabilidade', 'Caixa Econômica Federal', '013_CULTURA_SUSTENTABILIDADE-Guaracy.jpg'],
                ['Cultura e Sustentabilidade', 'Ana Berni', 'Helebrandt', 'Cultura e Sustentabilidade', 'Banrisul', '013_CULTURA_SUSTENTABILIDADE-Ana.jpg'],
                ['Cultura e Sustentabilidade', 'Tobias', 'Santos Monteiro', 'Cultura e Sustentabilidade', 'Banrisul', '013_CULTURA_SUSTENTABILIDADE-Tobias.jpg'],
                ['Aposentados e Seguridade Social', 'Natalina', 'Rosane Gue', 'Aposentados e Seguridade Social', 'Santander', '014_APROSENTADOS_SEGURIDADE-Natalina.jpg'],
                ['Aposentados e Seguridade Social', 'Claudete', 'Genuíno Marocco', 'Aposentados e Seguridade Social', 'Banrisul', '014_APROSENTADOS_SEGURIDADE-Claudete.jpg'],
                ['Aposentados e Seguridade Social', 'Ida', 'Pellegrino', 'Aposentados e Seguridade Social', 'Santander', '014_APROSENTADOS_SEGURIDADE-Ida.jpg'],
                ['Formação', 'Jairo', 'Severo Soares', 'Formação', 'Itaú', '015_FORMACAO-Jairo.jpg'],
                ['Formação', 'Itamara', 'Pinto Brum', 'Formação', 'Banrisul', '015_FORMACAO-Itamara.jpg'],
                ['Formação', 'Neiva', 'Berggrav', 'Formação', 'Caixa Econômica Federal', '015_FORMACAO-Neiva.jpg'],
                ['Financeiras e Terceirizados do Ramo Financeiro', 'Luiz', 'Cassemiro', 'Financeiras e Terceirizados', 'Santander', '016_FINANCEIRAS-Luiz.jpg'],
                ['Financeiras e Terceirizados do Ramo Financeiro', 'Antônio Augusto', 'Borges de Borges', 'Financeiras e Terceirizados', 'Itaú', '016_Administrativo-Antonio.jpg'],
                ['Financeiras e Terceirizados do Ramo Financeiro', 'Maria', 'Francilina Maier', 'Financeiras e Terceirizados', 'Caixa Econômica Federal', '016_FINANCEIRAS-Maria.jpg'],
                ['Conselho de Representação em Entidades de Grau Superior', 'Everton', 'de Morais Gimenis', 'Conselheiro (licenciado)', 'Bradesco', '017_CONSELHO-Everton.jpg'],
                ['Conselho de Representação em Entidades de Grau Superior', 'Ernesto', 'Humberto dos Santos', 'Conselheiro', 'Itaú', '017_CONSELHO-Ernesto.jpg'],
                ['Conselho Fiscal', 'Eroni', 'Batista Ribeiro', 'Conselho Fiscal', 'Banrisul', '018_CONSELHO_FISCAL-Eroni.jpg'],
                ['Conselho Fiscal', 'Rogério', 'de Rodrigues Rodrigues', 'Conselho Fiscal', 'Banco do Brasil', '018_CONSELHO_FISCAL-Rogerio.jpg'],
                ['Conselho Fiscal', 'Carmem', 'Guedes', 'Conselho Fiscal', 'Santander', '018_CONSELHO_FISCAL-Carmem.jpg'],
                ['Conselho Fiscal', 'Edson', 'Ramos da Rocha', 'Conselho Fiscal', 'Bradesco', '018_CONSELHO_FISCAL-Edson.jpg'],
                ['Conselho Fiscal', 'Nilton', 'Correa Gomes', 'Conselho Fiscal', 'Bradesco', '018_CONSELHO_FISCAL-Nilton.jpg'],
                ['Conselho Fiscal', 'Noelha', 'Rodrigues da Rosa', 'Conselho Fiscal', 'Banrisul', '018_CONSELHO_FISCAL-Noelha.jpg'],
                ['Conselho Fiscal', 'João Gilberto', 'Nunes Festa', 'Conselho Fiscal', 'Caixa Econômica Federal', '018_CONSELHO_FISCAL-joao.jpg'],
                ['Conselho Fiscal', 'Carlos Eduardo', 'Bobsin', 'Conselho Fiscal', 'Banrisul', '018_CONSELHO_FISCAL-Carlos-Eduardo.jpg']
            ];

            foreach ($directors as $index => [$categoryName, $firstName, $lastName, $roleName, $bankName, $fileName]) {
                $fileId = DB::table('files')->where('path', 'temporary/images/quem-somos/directorship')->where('file_name', $fileName)->value('id');
                if (!$fileId) {
                    $fileId = DB::table('files')->insertGetId([
                        'category_id' => 14,
                        'path' => 'temporary/images/quem-somos/directorship',
                        'name' => "{$firstName} {$lastName}",
                        'file_name' => $fileName,
                        'description' => 'Foto da diretoria',
                        'mime_type' => 'image/jpeg',
                        'extension' => 'jpg',
                        'size' => 0,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]);
                }

                DB::table('directors')->updateOrInsert(
                    ['first_name' => $firstName, 'last_name' => $lastName],
                    [
                        'role_name' => $roleName,
                        'director_category_id' => DB::table('director_categories')->where('name', $categoryName)->value('id'),
                        'bank_id' => DB::table('banks')->where('name', $bankName)->value('id'),
                        'image_id' => $fileId,
                        'display_order' => $index + 1,
                        'active' => true,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]
                );
            }
        });
    }
}
