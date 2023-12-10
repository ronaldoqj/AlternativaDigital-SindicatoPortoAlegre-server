<?php

namespace App\Http\Controllers\Site\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Bank;


class SearchController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

   public function list(Request $request)
   {
        $searchWords = $request->input('searchWords') ?? null;
        $departmentId = $request->input('departmentId') ?? null;
        $bankId = $request->input('bankId') ?? null;
        $page = $request->input('page');
        $perPage = $request->input('perPage');
        $news = News::orderBy('created_at', 'desc');
        $news = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews');

        if ($departmentId) {
            $news = $news->whereHas('departments', function ($query) use ($departmentId) {
                $query->where('departments.id', $departmentId);
            });
        }

        if ($bankId) {
            $news = $news->whereHas('banks', function ($query) use ($bankId) {
                $query->where('banks.id', $bankId);
            });
        }

        if (strlen($searchWords) > 2) {
            $news = $news->where(function ($query) use ($searchWords)
                    {
                        $query->where('topper', 'like', "%{$searchWords}%")
                              ->orWhere('title', 'like', "%{$searchWords}%")
                              ->orWhere('call', 'like', "%{$searchWords}%")
                              ->orWhere('text', 'like', "%{$searchWords}%")
                              ->orWhere('journalist_font', 'like', "%{$searchWords}%")
                              ->orWhere('tags', 'like', "%{$searchWords}%");
                    });
        }

        $news = $news->paginate($perPage);

        // ->simplePaginate($perPage);
        // $news = News::where('position_news', 'geral')
        //             // ->orderBy('id', 'asc')
        //             ->simplePaginate($perPage);
        return $news;
   }

   public function listBanks(Request $request)
   {
        $banks = Bank::all();

        return $banks;
   }
}

//
