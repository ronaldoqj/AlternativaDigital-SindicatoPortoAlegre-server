<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Bank\BankController;
use App\Http\Controllers\Page\PageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\GenericPage\GenericPageController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Agenda\AgendaController;
use App\Http\Controllers\Campaign\CampaignController;
use App\Http\Controllers\Video\VideoController;
use App\Http\Controllers\AgreementConvention\AgreementConventionController;
use App\Http\Controllers\CategoryAgreementConvention\CategoryAgreementConventionController;
use App\Http\Controllers\Insurance\InsuranceController;
use App\Http\Controllers\CategoryInsurance\CategoryInsuranceController;
use App\Http\Controllers\PublicNotice\PublicNoticeController;
use App\Http\Controllers\CategoryPublicNotice\CategoryPublicNoticeController;
use App\Http\Controllers\Publication\PublicationController;
use App\Http\Controllers\CategoryPublication\CategoryPublicationController;
use App\Http\Controllers\Unionize\UnionizeController;
use App\Http\Controllers\Site\Search\SearchController;
use App\Http\Controllers\Site\Unionize\UnionizeController as SiteUnionizeController;
use App\Http\Controllers\Site\Agenda\AgendaController as SiteAgendaController;
use App\Http\Controllers\Site\Video\VideoController as SiteVideoController;
use App\Http\Controllers\Site\Campaign\CampaignController as SiteCampaignController;
use App\Http\Controllers\Site\PublicNotice\PublicNoticeController as SitePublicNoticeController;
use App\Http\Controllers\Site\Publication\PublicationController as SitePublicationController;
use App\Http\Controllers\Site\GenericPage\GenericPageController as SiteGenericPageController;
use App\Http\Controllers\Site\AgreementConvention\AgreementConventionController as SiteAgreementConventionController;

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
    // Route::post('/get-user', [AuthController::class, 'me']);
    // Route::post('/login', function (Request $request) {
    //     return $request;
    // });
});

Route::prefix('auth')->namespace('Auth')->middleware('auth:api')->group(function ()
{
    Route::post('/get-user', [AuthController::class, 'me']);
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
    Route::get('/list-cards', [DepartmentController::class, 'listCards']);
    Route::post('/get', [DepartmentController::class, 'get']);
});

Route::prefix('generic-page')->namespace('Department')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [GenericPageController::class, 'list']);
    Route::post('/update', [GenericPageController::class, 'update']);
    Route::post('/list-cards', [GenericPageController::class, 'listCards']);
    Route::post('/get', [GenericPageController::class, 'get']);
});

Route::prefix('bank')->namespace('Bank')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [BankController::class, 'list']);
});

Route::prefix('page')->namespace('Page')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [PageController::class, 'list']);
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

Route::prefix('campaign')->namespace('Campaign')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [CampaignController::class, 'add']);
    Route::post('/list', [CampaignController::class, 'list']);
    Route::post('/update', [CampaignController::class, 'update']);
    Route::post('/delete', [CampaignController::class, 'delete']);
    Route::post('/get', [CampaignController::class, 'get']);
});

Route::prefix('video')->namespace('Video')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [VideoController::class, 'add']);
    Route::post('/list', [VideoController::class, 'list']);
    Route::post('/update', [VideoController::class, 'update']);
    Route::post('/delete', [VideoController::class, 'delete']);
    Route::post('/get', [VideoController::class, 'get']);
});

Route::prefix('agreement-convention')->namespace('AgreementConvention')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [AgreementConventionController::class, 'add']);
    Route::post('/list', [AgreementConventionController::class, 'list']);
    Route::post('/list-categories', [CategoryAgreementConventionController::class, 'list']);
    Route::post('/update', [AgreementConventionController::class, 'update']);
    Route::post('/delete', [AgreementConventionController::class, 'delete']);
    Route::post('/get', [AgreementConventionController::class, 'get']);
});

Route::prefix('insurance')->namespace('AgreementConvention')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [InsuranceController::class, 'add']);
    Route::post('/list', [InsuranceController::class, 'list']);
    Route::post('/list-categories', [CategoryInsuranceController::class, 'list']);
    Route::post('/update', [InsuranceController::class, 'update']);
    Route::post('/delete', [InsuranceController::class, 'delete']);
    Route::post('/get', [InsuranceController::class, 'get']);
});

Route::prefix('public-notice')->namespace('PublicNotice')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [PublicNoticeController::class, 'add']);
    Route::post('/list', [PublicNoticeController::class, 'list']);
    Route::post('/list-categories', [CategoryPublicNoticeController::class, 'list']);
    Route::post('/update', [PublicNoticeController::class, 'update']);
    Route::post('/delete', [PublicNoticeController::class, 'delete']);
    Route::post('/get', [PublicNoticeController::class, 'get']);
});

Route::prefix('publication')->namespace('Publication')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [PublicationController::class, 'add']);
    Route::post('/list', [PublicationController::class, 'list']);
    Route::post('/list-categories', [CategoryPublicationController::class, 'list']);
    Route::post('/update', [PublicationController::class, 'update']);
    Route::post('/delete', [PublicationController::class, 'delete']);
    Route::post('/get', [PublicationController::class, 'get']);
});

Route::prefix('news')->namespace('News')->middleware('auth:api')->group(function ()
{
    Route::post('/add', [NewsController::class, 'add']);
    Route::post('/list', [NewsController::class, 'list']);
    Route::post('/update', [NewsController::class, 'update']);
    Route::post('/delete', [NewsController::class, 'delete']);
    Route::post('/get-news', [NewsController::class, 'getNews']);
});

Route::prefix('unionize')->namespace('Unionize')->middleware('auth:api')->group(function ()
{
    Route::post('/list', [UnionizeController::class, 'list']);
    // Route::get('/download/assined/{id}', [UnionizeController::class, 'downloadFileAssined']);
    // Route::get('/download/assined-union-enrolment/{id}', [UnionizeController::class, 'downloadFileAssinedWithUnionEnrolment']);
    Route::post('/update-confirmed-status', [UnionizeController::class, 'updateConfirmedStatus']);
});

Route::prefix('unionize')->namespace('Unionize')->group(function ()
{
    Route::get('/download/assined/{id}', [UnionizeController::class, 'downloadFileAssined']);
    Route::get('/download/assined-union-enrolment/{id}', [UnionizeController::class, 'downloadFileAssinedWithUnionEnrolment']);
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

Route::prefix('site/video')->namespace('Site/Video')->group(function ()
{
    Route::post('/list', [SiteVideoController::class, 'list']);
});

Route::prefix('site/agreement-convention')->namespace('Site/AgreementConvention')->group(function ()
{
    Route::post('/list', [SiteAgreementConventionController::class, 'list']);
});

Route::prefix('site/public-notice')->namespace('Site/PublicNotice')->group(function ()
{
    Route::post('/list', [SitePublicNoticeController::class, 'list']);
});

Route::prefix('site/publication')->namespace('Site/Publication')->group(function ()
{
    Route::post('/list', [SitePublicationController::class, 'list']);
});

Route::prefix('site/generic-page')->namespace('Site/GenericPage')->group(function ()
{
    Route::post('/list', [SiteGenericPageController::class, 'list']);
    Route::post('/get', [SiteGenericPageController::class, 'get']);
});

Route::prefix('site/campaign')->namespace('Site/Campaign')->group(function ()
{
    Route::post('/list', [SiteCampaignController::class, 'list']);
});

Route::prefix('site/search')->namespace('Site/Search')->group(function ()
{
    Route::post('/list', [SearchController::class, 'list']);
    Route::post('/list-banks', [SearchController::class, 'listBanks']);
});

Route::prefix('site/unionize')->namespace('Site/Unionize')->group(function ()
{
    Route::post('/register', [SiteUnionizeController::class, 'register']);
    Route::post('/register-pdf-file', [SiteUnionizeController::class, 'registerPdfFile']);
    Route::post('/get-register-by-cpf', [SiteUnionizeController::class, 'getByCpf']);
    Route::post('/print', [SiteUnionizeController::class, 'print']);
    Route::get('/print/{cpf}', [SiteUnionizeController::class, 'print']);
    // Route::post('/get', [SiteNewsController::class, 'get']);
});
