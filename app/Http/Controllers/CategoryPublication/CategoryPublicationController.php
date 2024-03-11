<?php

namespace App\Http\Controllers\CategoryPublication;

use App\Http\Controllers\Controller;
use App\Models\CategoryPublication;

class CategoryPublicationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        $entity = CategoryPublication::orderBy('name', 'desc')->get();
        return $entity;
    }
}
