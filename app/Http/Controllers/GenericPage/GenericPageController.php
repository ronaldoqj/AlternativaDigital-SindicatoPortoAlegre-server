<?php

namespace App\Http\Controllers\GenericPage;

use App\Http\Controllers\Controller;
use App\Models\GenericPage;
use Illuminate\Http\Request;

class GenericPageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
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

    public function list(Request $request)
    {
        $groupPage = $request->input('group_page');
        $department = new GenericPage();
        return $department->where('group_page', $groupPage)
                          ->all();
    }

    public function listCards(Request $request)
    {
        $department = new GenericPage();
        $groupPage = $request->input('group_page');
        return $department->select('id', 'title', 'link', 'text', 'image_id')
                          ->where('group_page', $groupPage)
                          ->with('image')
                          ->get()
                          ->toArray();
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $entity = new GenericPage();
        $entity = $entity->find($id);
        $entity->image_id = $request->input('image')['id'] ?? null;
        $entity->title = $request->input('title') ?? null;
        $entity->link = $request->input('link') ?? null;
        $entity->text = $request->input('text') ?? null;

        $entity->save();

        return json_encode($entity);
    }
}
