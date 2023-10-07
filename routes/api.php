<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\News\NewsController;

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
    Route::post('/add', [FileController::class, 'add']);
    Route::post('/list', [FileController::class, 'list']);
});

Route::prefix('news')->namespace('News')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [NewsController::class, 'add']);
    Route::post('/list', [NewsController::class, 'list']);
    Route::post('/update', [NewsController::class, 'update']);
    Route::post('/delete', [NewsController::class, 'delete']);
    Route::post('/get-news', [NewsController::class, 'getNews']);
});
