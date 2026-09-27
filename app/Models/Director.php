<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'role_name',
        'director_category_id',
        'bank_id',
        'image_id',
        'display_order',
        'active'
    ];

    protected $casts = ['active' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(DirectorCategory::class, 'director_category_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id');
    }
}
