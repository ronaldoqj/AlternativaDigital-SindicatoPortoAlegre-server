<?php

namespace App\Http\Controllers\Publication;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new Publication();

        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $entity = new Publication();
        $entity = $entity->find($id);
        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function list()
    {
        $entity = Publication::with('file', 'categories')
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Publication();
        $entity = $entity->where('id', $id)
                         ->with('file', 'category')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $entity = new Publication();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
