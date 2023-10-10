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

    public function listHome()
    {
        $news = new News();
        $banners = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')
                        ->where('position_news', 'banner')
                        ->orderBy('id', 'desc')
                        ->get();
        $highlights = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')
                           ->where('position_news', 'highlights')
                           ->orderBy('id', 'desc')
                           ->limit(3)
                           ->get();
        $geral = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')
                      ->where('position_news', 'geral')
                      ->orderBy('id', 'desc')
                      ->limit(6)
                      ->get();
        $return = new stdClass();
        $return->banners = $banners;
        $return->highlights = $highlights;
        $return->geral = $geral;

        return $return;
    }

    public function getNews(Request $request)
    {
        $id = $request->input('id');

        $news = new News();
        $news = $news->where('id', $id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')->first();

        return $news;
    }
}
