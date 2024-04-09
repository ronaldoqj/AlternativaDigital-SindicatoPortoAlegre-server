<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PageVideo extends Pivot
{
    use HasFactory;

    protected $table = 'page_videos';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */

     public $incrementing = true;
}