<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenericPage extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
