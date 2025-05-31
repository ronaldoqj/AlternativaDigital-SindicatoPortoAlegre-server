<?php

namespace App\Http\Controllers\Site\CategoryInsurance;

use App\Http\Controllers\Controller;
use App\Models\CategoryInsurance;

class CategoryInsuranceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        return CategoryInsurance::orderBy('created_at', 'ASC')->get();
    }
}
