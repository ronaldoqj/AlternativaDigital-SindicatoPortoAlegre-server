<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageVideo;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Arr;

class VideoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new Video();
        $draft = $request->input('draft') ?? false;
        $pinToHome = $request->input('pinToHome') ?? false;

        $entity->image_id = $request->input('image')['id'] ?? null;
        $entity->video = $request->input('video') ?? null;
        $entity->draft = $draft ? 'y' : 'n';
        $entity->pin_to_home = $pinToHome ? 'y': 'n';
        $entity->title = $request->input('title') ?? null;
        $entity->call = $request->input('call') ?? null;

        $entity->save();

        $comboboxPages = $request->input('comboboxPages') ?? [];
        if (count($comboboxPages)) {
            $comboboxPagesIDs = Arr::pluck($comboboxPages, 'value');
            $entity->pages()->attach($comboboxPagesIDs);
        }

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $draft = $request->input('draft') ?? false;
        $pinToHome = $request->input('pinToHome') ?? false;

        $bomboboxPages = new PageVideo();
        $bomboboxPages = $bomboboxPages->where('video_id', $id);
        $bomboboxPages->delete();

        $entity = new Video();
        $entity = $entity->find($id);
        $entity->image_id = $request->input('image')['id'] ?? null;
        $entity->video = $request->input('video') ?? null;
        $entity->draft = $draft ? 'y' : 'n';
        $entity->pin_to_home = $pinToHome ? 'y': 'n';
        $entity->title = $request->input('title') ?? null;
        $entity->call = $request->input('call') ?? null;

        $entity->save();

        $comboboxPages = $request->input('comboboxPages') ?? [];
        if (count($comboboxPages)) {
            $comboboxPagesIDs = Arr::pluck($comboboxPages, 'value');
            $entity->pages()->attach($comboboxPagesIDs);
        }

        return json_encode($entity);
    }

    public function list()
    {
        $entity = Video::with('image', 'pages')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Video();
        $entity = $entity->where('id', $id)
                         ->with('image', 'pages')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $bomboboxPages = new PageVideo();
        $bomboboxPages = $bomboboxPages->where('video_id', $id);
        $bomboboxPages->delete();

        $entity = new Video();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
