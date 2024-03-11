<?php

namespace App\Http\Controllers\Site\Publication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $query = new Publication();
        $query = $query->with('file', 'categories');
        $query = $query->orderBy('category_id', 'DESC')->orderBy('created_at', 'DESC');
        $query = $query->get()
                       ->toArray();

        return $query;
    }
}
