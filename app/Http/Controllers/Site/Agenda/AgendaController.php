<?php

namespace App\Http\Controllers\Site\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $agenda = Agenda::with('image', 'cardImage', 'scheduledDates')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $agenda;
    }

    public function listHome()
    {
        //  To Do
    }

    public function related(Request $request)
    {
        //  To Do
    }

    public function relatedDates(Request $request)
    {
        //  To Do
    }

    public function get(Request $request)
    {
        $id = $request->input('id');
        $agenda = Agenda::where('id', $id)->with('image', 'cardImage', 'scheduledDates')->first();
        return $agenda;
    }
}
