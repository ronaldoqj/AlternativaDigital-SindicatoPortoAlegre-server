<?php

namespace App\Http\Controllers\Site\Insurance;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        $entity = Insurance::with('categories')
                           ->orderBy('category_id', 'ASC')
                           ->orderBy('title', 'ASC')
                           ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Insurance();
        $entity = $entity->where('id', $id)
                         ->with('category')
                         ->first();

        return $entity;
    }
}
