<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(CategoryInsurance::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsTo(CategoryInsurance::class, 'category_id');
    }
}
