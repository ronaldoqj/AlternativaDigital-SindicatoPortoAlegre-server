<?php

namespace App\Http\Controllers\CategoryAgreementConvention;

use App\Http\Controllers\Controller;
use App\Models\CategoryAgreementConvention;

class CategoryAgreementConventionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        $entity = CategoryAgreementConvention::orderBy('created_at', 'desc')->get();
        return $entity;
    }
}
