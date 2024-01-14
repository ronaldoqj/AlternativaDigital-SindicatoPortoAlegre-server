<?php

namespace App\Http\Controllers\CategoryPublicNotice;

use App\Http\Controllers\Controller;
use App\Models\CategoryPublicNotice;

class CategoryPublicNoticeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        $entity = CategoryPublicNotice::orderBy('name', 'desc')->get();
        return $entity;
    }
}
