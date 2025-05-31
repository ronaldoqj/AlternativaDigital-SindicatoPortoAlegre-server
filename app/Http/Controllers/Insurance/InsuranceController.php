<?php

namespace App\Http\Controllers\Insurance;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new Insurance();

        $entity->category_id = $request->input('category_id') ?? null;
        $entity->title = $request->input('title') ?? null;
        $entity->subtitle = $request->input('subtitle') ?? null;
        $entity->description = $request->input('description') ?? null;
        $entity->phone = $request->input('phone') ?? null;
        $entity->phone2 = $request->input('phone2') ?? null;
        $entity->address = $request->input('address') ?? null;
        $entity->address2 = $request->input('address2') ?? null;
        $entity->mail = $request->input('mail') ?? null;
        $entity->site = $request->input('site') ?? null;
        $entity->facebook = $request->input('facebook') ?? null;
        $entity->instagram = $request->input('instagram') ?? null;
        $entity->x = $request->input('x') ?? null;
        $entity->whatsapp = $request->input('whatsapp') ?? null;
        $entity->youtube = $request->input('youtube') ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $entity = new Insurance();
        $entity = $entity->find($id);

        if (!$entity) {
            abort(500, 'Not found');
        }

        $entity->category_id = $request->input('category_id') ?? null;
        $entity->title = $request->input('title') ?? null;
        $entity->subtitle = $request->input('subtitle') ?? null;
        $entity->description = $request->input('description') ?? null;
        $entity->phone = $request->input('phone') ?? null;
        $entity->phone2 = $request->input('phone2') ?? null;
        $entity->address = $request->input('address') ?? null;
        $entity->address2 = $request->input('address2') ?? null;
        $entity->mail = $request->input('mail') ?? null;
        $entity->site = $request->input('site') ?? null;
        $entity->facebook = $request->input('facebook') ?? null;
        $entity->instagram = $request->input('instagram') ?? null;
        $entity->x = $request->input('x') ?? null;
        $entity->whatsapp = $request->input('whatsapp') ?? null;
        $entity->youtube = $request->input('youtube') ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function list()
    {
        $entity = Insurance::with('categories')
                           ->orderBy('category_id', 'ASC')
                           ->orderBy('title', 'ASC')
                           ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Insurance();
        $entity = $entity->where('id', $id)
                         ->with('category')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $entity = new Insurance();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
