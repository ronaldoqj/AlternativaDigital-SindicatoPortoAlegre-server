<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function list()
    {
        return Gallery::withCount('items')->orderByDesc('created_at')->orderByDesc('id')->get();
    }

    public function get(Request $request)
    {
        return Gallery::with('items.image')->findOrFail($request->input('id'));
    }

    public function items(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:galleries,id',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|min:1|max:48'
        ]);

        return Gallery::findOrFail($validated['id'])
            ->items()
            ->with('image')
            ->paginate($validated['perPage'] ?? 8);
    }

    public function add(Request $request)
    {
        return $this->saveGallery($request, new Gallery());
    }

    public function update(Request $request)
    {
        return $this->saveGallery($request, Gallery::findOrFail($request->input('id')));
    }

    public function delete(Request $request)
    {
        $gallery = Gallery::findOrFail($request->input('id'));
        $gallery->delete();

        return $gallery;
    }

    private function saveGallery(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'subtitle' => 'nullable|string|max:240',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*.id' => [
                'required',
                'distinct',
                Rule::exists('files', 'id')->where(function ($query) {
                    $query->where('category_id', 15)->whereNull('deleted_at');
                })
            ]
        ]);

        return DB::transaction(function () use ($gallery, $validated) {
            $gallery->fill([
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'description' => $validated['description'] ?? null
            ])->save();

            $gallery->items()->delete();
            foreach ($validated['images'] ?? [] as $index => $image) {
                $gallery->items()->create([
                    'file_id' => $image['id'],
                    'display_order' => $index + 1
                ]);
            }

            return $gallery->load('items.image');
        });
    }
}
