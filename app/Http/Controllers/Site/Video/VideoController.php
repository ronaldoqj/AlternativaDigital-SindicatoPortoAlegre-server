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
        $agenda = Video::with('image', 'pages')
                        ->select(
                            'videos.*',
                            // 'agenda_dates.scheduled_date AS scheduled'
                        )
                        // ->join('agenda_dates', 'agenda_dates.agenda_id', '=', 'agendas.id')

                        // ->where('videos.draft', '==', 'n')
                        ->orderBy('created_at', 'ASC')
                        ->distinct()
                        ->get()->toArray();

        return $agenda;
    }
}
