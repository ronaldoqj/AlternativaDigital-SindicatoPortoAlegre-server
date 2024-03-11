<?php

namespace App\Http\Controllers\Site\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $page = $request->input('page') ?? null;

        $query = new Video();
        // $query = $query->where(function ($query) {
        //     $query->where('draft', '=', 'n')
        //           ->orWhere('pin_to_home', '=', 'y');
        // });
        $query = $query->with('image', 'pages');
        $query = $query->where('draft', 'n');
        $query = $query->orderBy('pin_to_home', 'desc')->orderBy('created_at', 'DESC');

        if ($page) {
            $query = $query->whereHas('pages', function ($query) use ($page) {
                $query->where('pages.id', $page);
            });
        }
        // ->join('agenda_dates', 'agenda_dates.agenda_id', '=', 'agendas.id')

        // ->where('videos.draft', '==', 'n')
        $query = $query->get()->toArray();

        return $query;
    }
}
