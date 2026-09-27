<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\DirectorCategory;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function list()
    {
        return DirectorCategory::whereHas('directors')
            ->with(['directors' => function ($query) {
                $query->with('category', 'bank', 'image')
                      ->orderBy('display_order')
                      ->orderBy('id');
            }])
            ->orderBy('display_order')
            ->orderBy('id')
            ->get();
    }

    public function get(Request $request)
    {
        return Director::with('category', 'bank', 'image')->findOrFail($request->input('id'));
    }

    public function add(Request $request)
    {
        return $this->saveDirector($request, new Director());
    }

    public function update(Request $request)
    {
        return $this->saveDirector($request, Director::findOrFail($request->input('id')));
    }

    public function delete(Request $request)
    {
        $director = Director::findOrFail($request->input('id'));
        $director->delete();

        return $director;
    }

    private function saveDirector(Request $request, Director $director)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:140',
            'lastName' => 'nullable|string|max:180',
            'roleName' => 'nullable|string|max:140',
            'category.value' => 'required|exists:director_categories,id',
            'bank.value' => 'nullable|exists:banks,id',
            'image.id' => 'nullable|exists:files,id',
            'displayOrder' => 'nullable|integer|min:0',
            'active' => 'nullable|boolean'
        ]);

        $director->fill([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'] ?? null,
            'role_name' => $validated['roleName'] ?? null,
            'director_category_id' => $validated['category']['value'],
            'bank_id' => $validated['bank']['value'] ?? null,
            'image_id' => $validated['image']['id'] ?? null,
            'display_order' => $validated['displayOrder'] ?? 0,
            'active' => $validated['active'] ?? true
        ])->save();

        return $director->load('category', 'bank', 'image');
    }
}
