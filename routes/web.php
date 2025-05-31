<?php

use App\Models\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('unionize');
    // $files = new File();
    // $files = $files->all();

    // return $files;

    return 'Página inicial';
});

Route::get('/convert', function () {
    // $path = public_path('/temporary');
    // $source = $path . '/test.pdf';
    // $source = $path . '/form.pdf';
    // $target = $path . '/testConverted.png';
    // // dump(file_exists($source));

    // return view('unionize_with_code', ['code' => '12313121', 'pdfPath' => '/temporary/test.pdf']);
    return 'Página Convert';
});

Route::get('/test', function () {
    // dump('Fabio Girotto Caldas');
    // dump('password: ' . Hash::make('fgc9574#cl'));
    // dump('-------------------------------------');
    // dump('Andressa Mendes da Silva');
    // dump('password: ' . Hash::make('ams7536#sv'));
    // dump('-------------------------------------');
    // dump('Lisandra Salgado Alves');
    // dump('password: ' . Hash::make('lsa6542#av'));
    // dump('-------------------------------------');

    // dump('Dijair Brilhantes Maria');
    // dump('password: ' . Hash::make('dij9574#mr'));
    // dump('-------------------------------------');
    // dump('Sérgio Hoff');
    // dump('password: ' . Hash::make('sg7536#hf'));
    // dump('-------------------------------------');


    // dump('Luciano Fetzner Barcellos');
    // dump('password: ' . Hash::make('lf9853#pr'));
    // dump('-------------------------------------');

    // $files = new File();
    // $files = $files->all();
    // return $files;

    return 'Página Test';
});
