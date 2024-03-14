<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function add(Request $request)
    {
        $entity = new Campaign();
        $draft = $request->input('draft') ?? false;
        $pinToHome = $request->input('pinToHome') ?? false;
        $showToHomeBanner = $request->input('showToHomeBanner') ?? false;
        $target = $request->input('target') ?? false;

        $entity->start_date = $request->input('startDate') ?? null;
        $entity->end_date = $request->input('endDate') ?? null;

        $entity->banner_desktop_id = $request->input('bannerDesktop')['id'] ?? null;
        $entity->banner_mobile_id = $request->input('bannerMobile')['id'] ?? null;
        $entity->card_image_id = $request->input('cardImage')['id'] ?? null;

        $entity->draft = $draft ? 'y' : 'n';
        $entity->pin_to_home = $pinToHome ? 'y': 'n';
        $entity->show_to_home_banner = $showToHomeBanner ? 'y': 'n';
        $entity->link = $request->input('link') ?? null;
        $entity->target = $target ? '_blank' : '_self';

        $entity->save();

        return json_encode($entity);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $draft = $request->input('draft') ?? false;
        $pinToHome = $request->input('pinToHome') ?? false;
        $showToHomeBanner = $request->input('showToHome') ?? false;
        $target = $request->input('target') ?? false;


        $entity = new Campaign();
        $entity = $entity->find($id);
        $entity->start_date = $request->input('startDate') ?? null;
        $entity->end_date = $request->input('endDate') ?? null;
        $entity->banner_desktop_id = $request->input('bannerDesktop')['id'] ?? null;
        $entity->banner_mobile_id = $request->input('bannerMobile')['id'] ?? null;
        $entity->card_image_id = $request->input('cardImage')['id'] ?? null;
        $entity->draft = $draft ? 'y' : 'n';
        $entity->pin_to_home = $pinToHome ? 'y': 'n';
        $entity->show_to_home_banner = $showToHomeBanner ? 'y': 'n';
        $entity->link = $request->input('link') ?? null;
        $entity->target = $target ? '_blank' : '_self';

        $entity->save();

        return json_encode($entity);
    }

    public function list()
    {
        $entity = Campaign::with('cardImage', 'bannerDesktop', 'bannerMobile')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return $entity;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        $entity = new Campaign();
        $entity = $entity->where('id', $id)
                         ->with('cardImage', 'bannerDesktop', 'bannerMobile')
                         ->first();

        return $entity;
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        $entity = new Campaign();
        $entity = $entity->find($id);
        $entity->delete();

        return $entity;
    }
}
