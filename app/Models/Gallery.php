<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description'];

    public function items()
    {
        return $this->hasMany(GalleryItem::class)->orderBy('display_order')->orderBy('id');
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class)->withTimestamps();
    }
}
