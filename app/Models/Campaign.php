<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

// 'bannerDesktop', 'bannerMobile', 'imageNews'
    public function bannerDesktop()
    {
        return $this->belongsTo(File::class, 'banner_desktop_id');
    }

    public function bannerMobile()
    {
        return $this->belongsTo(File::class, 'banner_mobile_id');
    }

    public function cardImage()
    {
        return $this->belongsTo(File::class, 'card_image_id');
    }
}
