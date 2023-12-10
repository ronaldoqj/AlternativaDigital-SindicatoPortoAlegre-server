<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Agenda\AgendaController;
use App\Http\Controllers\Site\Search\SearchController;
use App\Http\Controllers\Site\Unionize\UnionizeController;
use App\Http\Controllers\Site\Agenda\AgendaController as SiteAgendaController;

// Site
use App\Http\Controllers\Site\News\NewsController as SiteNewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('auth')->namespace('Auth')->group(function ()
{
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/login', function (Request $request) {
    //     return $request;
    // });
});

Route::prefix('user')->namespace('User')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [UserController::class, 'list']);
    // Route::post('/login', function (Request $request) {
    //     return $request;
    // });
});

Route::prefix('department')->namespace('Department')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [DepartmentController::class, 'list']);
});

Route::prefix('bank')->namespace('Bank')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [BankController::class, 'list']);

});

Route::prefix('file')->namespace('File')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [FileController::class, 'list']);
    Route::post('/add', [FileController::class, 'add']);
    Route::post('/update', [FileController::class, 'update']);
    Route::post('/delete', [FileController::class, 'delete']);
});

Route::prefix('agenda')->namespace('Agenda')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [AgendaController::class, 'add']);
    Route::post('/list', [AgendaController::class, 'list']);
    Route::post('/update', [AgendaController::class, 'update']);
    Route::post('/delete', [AgendaController::class, 'delete']);
    Route::post('/get-agenda', [AgendaController::class, 'getAgenda']);
});

Route::prefix('news')->namespace('News')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [NewsController::class, 'add']);
    Route::post('/list', [NewsController::class, 'list']);
    Route::post('/update', [NewsController::class, 'update']);
    Route::post('/delete', [NewsController::class, 'delete']);
    Route::post('/get-news', [NewsController::class, 'getNews']);
});

Route::prefix('site/news')->namespace('Site/News')->group(function ()
{
    Route::post('/list', [SiteNewsController::class, 'list']);
    Route::post('/list-home', [SiteNewsController::class, 'listHome']);
    Route::post('/related', [SiteNewsController::class, 'related']);
    Route::post('/related-department', [SiteNewsController::class, 'relatedDepartment']);
    Route::post('/get', [SiteNewsController::class, 'get']);

    // Route::post('/list', function () {
    //     $files = new File();
    //     $files = $files->all();

    //     return $files;
    // });
});

Route::prefix('site/agenda')->namespace('Site/Agenda')->group(function ()
{
    Route::post('/list', [SiteAgendaController::class, 'list']);
    Route::post('/list-home', [SiteAgendaController::class, 'listHome']);
    Route::post('/related', [SiteAgendaController::class, 'related']);
    Route::post('/get', [SiteAgendaController::class, 'get']);
});

Route::prefix('site/search')->namespace('Site/Search')->group(function ()
{
    Route::post('/list', [SearchController::class, 'list']);
    Route::post('/list-banks', [SearchController::class, 'listBanks']);
});

Route::prefix('site/unionize')->namespace('Site/Unionize')->group(function ()
{
    Route::post('/register', [UnionizeController::class, 'register']);
    Route::post('/register-pdf-file', [UnionizeController::class, 'registerPdfFile']);
    Route::post('/get-register-by-cpf', [UnionizeController::class, 'getByCpf']);
    Route::post('/print', [UnionizeController::class, 'print']);
    Route::get('/print/{cpf}', [UnionizeController::class, 'print']);
    // Route::post('/get', [SiteNewsController::class, 'get']);
});
