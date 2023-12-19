<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\AgendaDate;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $agenda = new Agenda();
        $agenda->image_id = $request->input('image')['id'] ?? null;
        $agenda->card_image_id = $request->input('cardImage')['id'] ?? null;
        $agenda->topper = $request->input('topper') ?? null;
        $agenda->title = $request->input('title') ?? null;
        $agenda->call = $request->input('call') ?? null;
        $agenda->text = $request->input('text') ?? null;
        $scheduledDates = $request->input('scheduledDate') ?? [];

        if (count($scheduledDates))
        {
            $agenda->start_date = $scheduledDates[0];

            if (count($scheduledDates) > 1) {
                $agenda->end_date = $scheduledDates[count($scheduledDates) - 1];
            }

            if (count($scheduledDates) > 2) {
                $agenda->has_intermediaries_dates = 'y';
            }
        }

        $agenda->save();

        foreach ($scheduledDates as $value)
        {
            $agendaDate = new AgendaDate();
            $agendaDate->agenda_id = $agenda->id;
            $agendaDate->scheduled_date = $value;
            $agendaDate->save();
        }

        return json_encode($agenda);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $scheduledDates = new AgendaDate();
        $dates = $scheduledDates->where('agenda_id', $id);
        $dates->delete();
        $scheduledDates = $request->input('scheduledDate') ?? [];

        $agenda = new Agenda();
        $agenda = $agenda->find($id);
        $agenda->image_id = $request->input('image')['id'] ?? null;
        $agenda->card_image_id = $request->input('cardImage')['id'] ?? null;
        $agenda->topper = $request->input('topper') ?? null;
        $agenda->title = $request->input('title') ?? null;
        $agenda->call = $request->input('call') ?? null;
        $agenda->text = $request->input('text') ?? null;

        if (count($scheduledDates))
        {
            $agenda->start_date = $scheduledDates[0];

            if (count($scheduledDates) > 1) {
                $agenda->end_date = $scheduledDates[count($scheduledDates) - 1];
            }

            if (count($scheduledDates) > 2) {
                $agenda->has_intermediaries_dates = 'y';
            }
        }

        $agenda->save();

        foreach ($scheduledDates as $value)
        {
            $agendaDate = new AgendaDate();
            $agendaDate->agenda_id = $agenda->id;
            $agendaDate->scheduled_date = $value;
            $agendaDate->save();
        }

        return json_encode($agenda);
    }

    public function list()
    {
        $agenda = Agenda::with('image', 'cardImage', 'scheduledDates')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $agenda;
    }

    public function getAgenda(Request $request)
    {
        $id = $request->input('id');

        $agenda = new Agenda();
        $agenda = $agenda->where('id', $id)
                         ->with('image', 'cardImage', 'scheduledDates')
                         ->first();

        return $agenda;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $dates = new AgendaDate();
        $dates = $dates->where('agenda_id', $id);
        $dates->delete();

        $agenda = new Agenda();
        $agenda = $agenda->find($id);
        $agenda->delete();

        return $agenda;
    }
}
