<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;


    public function banner()
    {
        return $this->belongsTo(File::class, 'banner_id');
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
