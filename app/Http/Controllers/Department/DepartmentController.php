<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Department();
        $entity = $entity->where('id', $id)
                         ->with('image')
                         ->first();

        return $entity;
    }

    public function list(Request $request)
    {
        $department = new Department();
        return $department->all();
    }

    public function listCards(Request $request)
    {
        $department = new Department();
        return $department->select('id', 'name', 'description', 'image_id')
                          ->with('image')
                          ->get()
                          ->toArray();
    }
}
