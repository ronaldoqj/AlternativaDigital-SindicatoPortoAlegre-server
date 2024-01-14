<?php

namespace App\Http\Controllers\PublicNotice;

use App\Http\Controllers\Controller;
use App\Models\PublicNotice;
use App\Models\PageVideo;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Arr;

class PublicNoticeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new PublicNotice();

        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $entity = new PublicNotice();
        $entity = $entity->find($id);
        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function list()
    {
        $entity = PublicNotice::with('file', 'categories')
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new PublicNotice();
        $entity = $entity->where('id', $id)
                         ->with('file', 'category')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $entity = new PublicNotice();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
