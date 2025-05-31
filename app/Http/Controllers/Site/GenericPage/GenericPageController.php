<?php

namespace App\Http\Controllers\Site\GenericPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GenericPage;

class GenericPageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $withoutText = $request->input('withoutText') ?? null;
        $groupPage = $request->input('group_page') ?? null;
        $query = new GenericPage();
        if ($withoutText) {
            $query = $query->select(
                'id',
                'title',
                'image_id',
                'created_at',
                'updated_at'
            );
        }
        $query = $query->with('image');
        $query = $query->where('group_page', $groupPage);
        $query = $query->orderBy('id', 'ASC');
        $query = $query->get()
                       ->toArray();
        return $query;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');
        $entity = new GenericPage();
        $entity = $entity->where('id', $id)
                         ->with('image')
                         ->first();
        return $entity;
    }
}
