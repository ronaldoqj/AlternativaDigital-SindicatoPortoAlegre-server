<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'video_id');
    }

    public function pages(): BelongsToMany
    {
        // return $this->belongsToMany(Page::class)->using(PageVideo::class)->withPivot('created_at');
        return $this->belongsToMany(Page::class, 'page_videos', 'video_id', 'page_id')->withPivot('created_at');
    }
}
