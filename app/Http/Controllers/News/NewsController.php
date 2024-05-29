<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\BankNews;
use App\Models\DepartmentNews;
use Illuminate\Http\Request;
use App\Models\News as News;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function add(Request $request)
    {
        $news = new News();
        $draft = $request->input('draft') ?? false;

        $news->type_news = $request->input('typeNews') ?? null;
        $news->position_news = $request->input('positionNews') ?? null;
        $news->draft = $draft ? 'y' : 'n';
        $news->start_date = $request->input('startDate') ?? null;
        $news->end_date = $request->input('endDate') ?? null;
        $news->banner_desktop_id = $request->input('bannerDesktop')['id'] ?? null;
        $news->banner_mobile_id = $request->input('bannerMobile')['id'] ?? null;
        $news->image_news_id = $request->input('imageNews')['id'] ?? null;
        $news->position_image_news = $request->input('imageNewsPosition') ?? null;
        $news->video_news = $request->input('videoNews') ?? null;
        $news->position_video_news = $request->input('videoNewsPosition') ?? null;
        $news->audio_news_id = $request->input('audioNews')['id'] ?? null;
        $news->position_audio_news = $request->input('audioNewsPosition') ?? null;
        $news->topper = $request->input('topper') ?? null;
        $news->title = $request->input('title') ?? null;
        $news->call = $request->input('call') ?? null;
        $news->text = $request->input('text') ?? null;
        $news->journalist_font = $request->input('journalistFont') ?? null;
        $news->url_email = $request->input('urlEmail') ?? null;
        $news->tags = $request->input('tags') ?? null;

        if ($request->input('createDate') && strlen($request->input('createDate'))) {
            $news->created_at = $request->input('createDate');
        }

        $news->save();

        $departments = $request->input('department') ?? [];
        if (count($departments)) {
            $departmentsIDs = Arr::pluck($departments, 'value');
            $news->departments()->attach($departmentsIDs);
        }

        $banks = $request->input('bank') ?? [];
        if (count($banks)) {
            $banksIDs = Arr::pluck($banks, 'value');
            $news->banks()->attach($banksIDs);
        }

        return json_encode($news);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $draft = $request->input('draft') ?? false;

        $departments = new DepartmentNews();
        $departments = $departments->where('news_id', $id);
        $departments->delete();

        $banks = new BankNews();
        $banks = $banks->where('news_id', $id);
        $banks->delete();

        $news = new News();
        $news = $news->find($id);
        $news->type_news = $request->input('typeNews') ?? null;
        $news->position_news = $request->input('positionNews') ?? null;
        $news->draft = $draft ? 'y' : 'n';
        $news->start_date = $request->input('startDate') ?? null;
        $news->end_date = $request->input('endDate') ?? null;
        $news->banner_desktop_id = $request->input('bannerDesktop')['id'] ?? null;
        $news->banner_mobile_id = $request->input('bannerMobile')['id'] ?? null;
        $news->image_news_id = $request->input('imageNews')['id'] ?? null;
        $news->position_image_news = $request->input('imageNewsPosition') ?? null;
        $news->video_news = $request->input('videoNews') ?? null;
        $news->position_video_news = $request->input('videoNewsPosition') ?? null;
        $news->audio_news_id = $request->input('audioNews')['id'] ?? null;
        $news->position_audio_news = $request->input('audioNewsPosition') ?? null;
        $news->topper = $request->input('topper') ?? null;
        $news->title = $request->input('title') ?? null;
        $news->call = $request->input('call') ?? null;
        $news->text = $request->input('text') ?? null;
        $news->journalist_font = $request->input('journalistFont') ?? null;
        $news->url_email = $request->input('urlEmail') ?? null;
        $news->tags = $request->input('tags') ?? null;

        if ($request->input('createDate') && strlen($request->input('createDate'))) {
            $news->created_at = $request->input('createDate');
        }
        $news->save();

        $departments = $request->input('department') ?? [];
        if (count($departments)) {
            $departmentsIDs = Arr::pluck($departments, 'value');
            $news->departments()->attach($departmentsIDs);
        }

        $banks = $request->input('bank') ?? [];
        if (count($banks)) {
            $banksIDs = Arr::pluck($banks, 'value');
            $news->banks()->attach($banksIDs);
        }

        return json_encode($news);
    }

    public function list(Request $request)
    {
        $searchWords = $request->input('searchWords') ?? null;
        $departmentId = $request->input('departmentId') ?? null;
        $page = $request->input('page');
        $perPage = $request->input('perPage');
        $news = News::orderBy('created_at', 'desc');
        $news = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews');
        // $news = $news->where('draft', 'n');
        if ($departmentId) {
            $news = $news->whereHas('departments', function ($query) use ($departmentId) {
                $query->where('departments.id', $departmentId);
            });
        }

        if (strlen($searchWords)) {
            $news = $news->where(function ($query) use ($searchWords)
                    {
                        $query->where('topper', 'like', "%{$searchWords}%")
                              ->orWhere('title', 'like', "%{$searchWords}%")
                              ->orWhere('call', 'like', "%{$searchWords}%")
                              ->orWhere('text', 'like', "%{$searchWords}%")
                              ->orWhere('journalist_font', 'like', "%{$searchWords}%")
                              ->orWhere('tags', 'like', "%{$searchWords}%");
                    });
        }

        $news = $news->paginate($perPage);
        return $news;

        // $news = News::with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank', 'departments', 'banks')->orderBy('created_at', 'desc')->get();
        // return $news;
    }

    public function getNews(Request $request)
    {
        $id = $request->input('id');

        $news = new News();
        $news = $news->where('id', $id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank', 'departments', 'banks')->first();

        return $news;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $departments = new DepartmentNews();
        $departments = $departments->where('news_id', $id);
        $departments->delete();

        $banks = new BankNews();
        $banks = $banks->where('news_id', $id);
        $banks->delete();

        $news = new News();
        $news = $news->find($id);
        $news->delete();

        return $news;
    }
}
