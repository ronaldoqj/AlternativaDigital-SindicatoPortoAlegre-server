<?php

namespace App\Http\Controllers\Site\AgreementConvention;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgreementConvention;

class AgreementConventionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $query = new AgreementConvention();
        $query = $query->with('file', 'categories');
        $query = $query->orderBy('created_at', 'DESC')->orderBy('category_id', 'DESC');
        $query = $query->get()
                       ->toArray();

        return $query;
    }
}
