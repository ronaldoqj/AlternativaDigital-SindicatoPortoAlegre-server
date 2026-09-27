<?php

namespace App\Http\Controllers\Site\Director;

use App\Http\Controllers\Controller;
use App\Models\DirectorCategory;

class DirectorController extends Controller
{
    public function list()
    {
        return DirectorCategory::whereHas('directors', fn ($query) => $query->where('active', true))
            ->with(['directors' => function ($query) {
                $query->where('active', true)
                      ->with('bank', 'image')
                      ->orderBy('display_order')
                      ->orderBy('id');
            }])
            ->orderBy('display_order')
            ->orderBy('id')
            ->get();
    }
}
