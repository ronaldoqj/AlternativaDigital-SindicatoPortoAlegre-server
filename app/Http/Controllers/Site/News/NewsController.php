<?php

namespace App\Http\Controllers\Site\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use stdClass;

class NewsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $departmentId = $request->input('departmentId') ?? null;
        $page = $request->input('page');
        $perPage = $request->input('perPage');
        $news = News::orderBy('created_at', 'desc');
        $news = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews');
        // $news = $news->where('position_news', 'geral');
        if ($departmentId) {
            $news = $news->whereHas('departments', function ($query) use ($departmentId) {
                $query->where('departments.id', $departmentId);
            });
        }
        $news = $news->paginate($perPage);
        // ->simplePaginate($perPage);
        // $news = News::where('position_news', 'geral')
        //             // ->orderBy('id', 'asc')
        //             ->simplePaginate($perPage);

        return $news;
    }

    public function listHome()
    {
        $news = new News();
        $banners = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                        ->where('position_news', 'banner')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $highlights = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                           ->where('position_news', 'highlights')
                           ->orderBy('created_at', 'desc')
                           ->limit(3)
                           ->get();
        $geral = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                      ->where('position_news', 'geral')
                      ->orderBy('created_at', 'desc')
                      ->limit(6)
                      ->get();
        $return = new stdClass();
        $return->banners = $banners;
        $return->highlights = $highlights;
        $return->geral = $geral;

        return $return;
    }

    public function related(Request $request)
    {
        $perPage = $request->input('perPage');
        $notNews = $request->input('notNews');
        $notNews = News::find($request->input('notNews'));
        $news = News::with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                    ->where('topper', $notNews->topper)
                    ->whereNotIn('id', [$notNews->id])
                    ->orderBy('created_at', 'desc')
                    ->limit($perPage)
                    ->get();

        return $news;
    }

    public function relatedDepartment(Request $request)
    {
        // $perPage = $request->input('perPage');
        // $notNews = $request->input('notNews');
        $departmentId = $request->input('department_id');
        $limit = $request->input('limit');
        $news = News::with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments')
                    ->whereHas('departments', function ($query) use ($departmentId) {
                        $query->where('departments.id', $departmentId);
                    })
                    ->orderBy('created_at', 'desc')
                    ->limit($limit)
                    ->get();

        return $news;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        // $news = News::find($id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments', 'banks');
        $news = News::where('id', $id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments', 'banks')->first();

        return $news;
    }
}
