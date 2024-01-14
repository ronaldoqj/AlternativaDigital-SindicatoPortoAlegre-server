<?php

namespace App\Http\Controllers\AgreementConvention;

use App\Http\Controllers\Controller;
use App\Models\AgreementConvention;
use Illuminate\Http\Request;

class AgreementConventionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new AgreementConvention();

        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $entity = new AgreementConvention();
        $entity = $entity->find($id);
        $entity->file_id = $request->input('file')['id'] ?? null;
        $entity->category_id = $request->input('combobox')['value'] ?? null;

        $entity->save();

        return json_encode($entity);
    }

    public function list()
    {
        $entity = AgreementConvention::with('file', 'categories')
                                     ->orderBy('created_at', 'desc')
                                     ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new AgreementConvention();
        $entity = $entity->where('id', $id)
                         ->with('file', 'category')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $entity = new AgreementConvention();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
