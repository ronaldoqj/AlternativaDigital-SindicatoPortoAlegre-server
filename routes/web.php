<?php

use App\Models\File;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    $files = new File();
    $files = $files->all();

    return $files;
});
