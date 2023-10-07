<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function bannerDesktop()
    {
        return $this->belongsTo(File::class, 'banner_desktop_id');
    }

    public function bannerMobile()
    {
        return $this->belongsTo(File::class, 'banner_mobile_id');
    }

    public function imageNews()
    {
        return $this->belongsTo(File::class, 'image_news_id');
    }

    public function audioNews()
    {
        return $this->belongsTo(File::class, 'audio_news_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
