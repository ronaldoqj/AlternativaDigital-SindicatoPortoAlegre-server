<?php

namespace App\Http\Controllers\Site\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Collection;
use DateTime;

class AgendaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $now = now();
        $dataAtual = new DateTime();
        // Formata a data para exibir apenas a parte da data (sem a hora)
        $now = $dataAtual->format('Y-m-d');
        // Exibe a data formatada

        $agenda = Agenda::with('image', 'cardImage', 'scheduledDates')
                        ->select(
                            'agendas.*',
                            // 'agenda_dates.scheduled_date AS scheduled'
                        )
                        // ->join('agenda_dates', 'agenda_dates.agenda_id', '=', 'agendas.id')
                        ->where('agendas.end_date', '>=', $now)
                        ->orderBy('start_date', 'ASC')
                        ->distinct()
                        ->get()->toArray();

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
