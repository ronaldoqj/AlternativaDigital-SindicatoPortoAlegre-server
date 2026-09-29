<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_id', 'file_id', 'display_order'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
