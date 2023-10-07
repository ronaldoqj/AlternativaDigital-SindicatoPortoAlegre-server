<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News as News;

class NewsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function add(Request $request)
    {
        $news = new News();
        $news->type_news = $request->input('typeNews');
        $news->position_news = $request->input('positionNews');
        $news->department_id = $request->input('department')['value'];
        $news->bank_id = $request->input('bank')['value'];
        $news->start_date = $request->input('startDate');
        $news->end_date = $request->input('endDate');
        $news->banner_desktop_id = $request->input('bannerDesktop')['id'];
        $news->banner_mobile_id = $request->input('bannerMobile')['id'];
        $news->image_news_id = $request->input('imageNews')['id'];
        $news->position_image_news = $request->input('imageNewsPosition');
        $news->video_news = $request->input('videoNews');
        $news->position_video_news = $request->input('videoNewsPosition');
        $news->audio_news_id = $request->input('audioNews')['id'];
        $news->position_audio_news = $request->input('audioNewsPosition');
        $news->topper = $request->input('topper');
        $news->title = $request->input('title');
        $news->call = $request->input('call');
        $news->text = $request->input('text');
        $news->journalist_font = $request->input('journalistFont');
        $news->url_email = $request->input('urlEmail');
        $news->tags = $request->input('tags');
        $news->save();

        return json_encode($news);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $news = new News();
        $news = $news->find($id);
        $news->type_news = $request->input('typeNews');
        $news->position_news = $request->input('positionNews');
        $news->department_id = $request->input('department')['value'];
        $news->bank_id = $request->input('bank')['value'];
        $news->start_date = $request->input('startDate');
        $news->end_date = $request->input('endDate');
        $news->banner_desktop_id = $request->input('bannerDesktop')['id'];
        $news->banner_mobile_id = $request->input('bannerMobile')['id'];
        $news->image_news_id = $request->input('imageNews')['id'];
        $news->position_image_news = $request->input('imageNewsPosition');
        $news->video_news = $request->input('videoNews');
        $news->position_video_news = $request->input('videoNewsPosition');
        $news->audio_news_id = $request->input('audioNews')['id'];
        $news->position_audio_news = $request->input('audioNewsPosition');
        $news->topper = $request->input('topper');
        $news->title = $request->input('title');
        $news->call = $request->input('call');
        $news->text = $request->input('text');
        $news->journalist_font = $request->input('journalistFont');
        $news->url_email = $request->input('urlEmail');
        $news->tags = $request->input('tags');
        $news->save();

        return json_encode($news);
    }

    public function list()
    {
        $news = new News();
        $news = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')->orderBy('id', 'desc')->get();

        return $news;
    }

    public function getNews(Request $request)
    {
        $id = $request->input('id');

        $news = new News();
        $news = $news->where('id', $id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'department', 'bank')->first();

        return $news;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $news = new News();
        $news = $news->find($id);
        $news->delete();

        return $news;
    }
}
