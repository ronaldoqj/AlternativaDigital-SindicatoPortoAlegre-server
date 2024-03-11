<?php

namespace App\Http\Controllers\Site\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $today = date("Y-m-d H:i:s");
        $query = new Campaign();
        $query = $query->with('cardImage', 'bannerDesktop', 'bannerMobile');
        $query = $query->where('draft', 'n');
        $query = $query->where('start_date', '<=', $today);
        $query = $query->where('end_date', '>=', $today);
        $query = $query->orderBy('pin_to_home', 'desc')
                       ->orderBy('created_at', 'DESC');
        $query = $query->get()->toArray();

        return $query;
    }
}
