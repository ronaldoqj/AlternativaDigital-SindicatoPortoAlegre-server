<?php

namespace App\Http\Controllers\DirectorCategory;

use App\Http\Controllers\Controller;
use App\Models\DirectorCategory;
use Illuminate\Http\Request;

class DirectorCategoryController extends Controller
{
    public function list()
    {
        return DirectorCategory::withCount('directors')->orderBy('display_order')->orderBy('id')->get();
    }

    public function add(Request $request)
    {
        return DirectorCategory::create($this->validateData($request));
    }

    public function update(Request $request)
    {
        $category = DirectorCategory::findOrFail($request->input('id'));
        $category->update($this->validateData($request));

        return $category;
    }

    public function delete(Request $request)
    {
        $category = DirectorCategory::withCount('directors')->findOrFail($request->input('id'));
        abort_if($category->directors_count > 0, 422, 'Category has directors');
        $category->delete();

        return $category;
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:140',
            'role_name' => 'nullable|string|max:140',
            'display_order' => 'nullable|integer|min:0'
        ]);
    }
}
