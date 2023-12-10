<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function cardImage()
    {
        return $this->belongsTo(File::class, 'card_image_id');
    }

    public function scheduledDates()
    {
        // return $this->belongsTo(AgendaDate::class, 'id');

        return $this->hasMany(AgendaDate::class, 'agenda_id', 'id');
    }
}
