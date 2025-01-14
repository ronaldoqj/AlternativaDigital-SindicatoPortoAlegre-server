<?php

namespace App\Http\Controllers\Site\News;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\News;
use stdClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewsController extends Controller
{
    const LIMIT_BANNERS_HOME = 10;

    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list(Request $request)
    {
        $departmentId = $request->input('departmentId') ?? null;
        $page = $request->input('page');
        $perPage = $request->input('perPage');
        $notIds = $request->input('notIds') ?? [];
        $news = News::orderBy('created_at', 'desc');
        $news = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews');
        $news = $news->where('draft', 'n');
        $news = $news->whereNotIn('id', $notIds);
        // $news = $news->where('position_news', 'geral');
        if ($departmentId) {
            $news = $news->whereHas('departments', function ($query) use ($departmentId) {
                $query->where('departments.id', $departmentId);
            });
        }
        $news = $news->paginate($perPage);
        // ->simplePaginate($perPage);
        // $news = News::where('position_news', 'geral')
        //             // ->orderBy('id', 'asc')
        //             ->simplePaginate($perPage);

        return $news;
    }

    public function listHome()
    {

//         INSERT INTO `users` (`name`, `email`, `profile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
// ('Martina Pinheiro', 'lais@sindbancarios.org.br', 'normal', NULL, '$2y$10$wuln2pIVb7oHHJ1VHs.7xO0TfeyiVr9sy4Z7hBHU6i3MVmYxA7Hhu', NULL, '2024-04-15 22:40:51', NULL);

//         INSERT INTO `users` (`name`, `email`, `profile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
// ('Laís Escher', 'celio@sindbancarios.org.br', 'normal', NULL, '$2y$10$EIpEQp1LUJAWbdXu6YDSd.8lByPNGfFQdSU7bMGba9jwtq2ToD3p.', NULL, '2023-12-10 02:55:51', NULL);

        // (51)980222704
        // DB::table('users')->insert([
        //     'name' => 'Martina Pinheiro',
        //     'profile' => 'normal',
        //     'email' => 'martina@sindbancarios.org.br',
        //     'password' => Hash::make('MAR01122023#pinheiro'),
        //     'created_at' => Carbon::now()->addSecond(3)
        // ]);

        // (51)98402-8358
        // DB::table('users')->insert([
        //     'name' => 'Célio Romeu dos Santos',
        //     'profile' => 'normal',
        //     'email' => 'celio@sindbancarios.org.br',
        //     'password' => Hash::make('CEL01122023#romeu'),
        //     'created_at' => Carbon::now()->addSecond(3)
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Laís Escher',
        //     'profile' => 'normal',
        //     'email' => 'lais@sindbancarios.org.br',
        //     'password' => Hash::make('LA01122023#is'),
        //     'created_at' => Carbon::now()->addSecond(3)
        // ]);

        // $var1 = Hash::make('LA01122023#is');

        /**
         * Section banner
         *  Campanha Prioridade
         *  Noticias Banner
         * Section Noticia Destaque
         *  Fixo
         *  Data de criação decresente
         * Section Noticia Geral
         *  Apresentar também as que não apareceram nos destaques
         *  Fixo
         *  Data de criação decresente
         */
        $campaign = new Campaign();
        $campaign = $campaign->select('*',
                                      DB::raw('(select "campaign") AS entityType'),
                                      DB::raw('(select NULL) AS title'))
                             ->with('bannerDesktop', 'bannerMobile')
                             ->where('show_to_home_banner', 'y')
                             ->where('draft', 'n')
                             ->orderBy('pin_to_home', 'DESC')
                             ->limit(self::LIMIT_BANNERS_HOME)
                             ->get()
                             ->toArray();
        $news = new News();
        $remaining = self::LIMIT_BANNERS_HOME - count($campaign);
        $newsBanners = $news->select('*',
                                     DB::raw('(select "news") AS entityType'));
        $newsBanners = $newsBanners->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews');
        $newsBanners = $newsBanners->where('position_news', 'banner');
        $newsBanners = $newsBanners->where('draft', 'n');
        $newsBanners = $newsBanners->orderBy('created_at', 'desc');
        $newsBanners = $newsBanners->limit($remaining);
        $newsBanners = $newsBanners->get()
                                   ->toArray();

        $notIds = array_column($newsBanners, 'id');
        $banners = array_merge($campaign, $newsBanners);

        $highlights = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                           ->where('position_news', 'highlights')
                           ->where('draft', 'n')
                           ->whereNotIn('id', $notIds)
                           ->orderBy('created_at', 'desc')
                           ->limit(3)
                           ->get()->toArray();

        $notIds = array_merge(array_column($highlights, 'id'), $notIds);

        $geral = $news->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                      ->where('position_news', 'geral')
                      ->where('draft', 'n')
                      ->whereNotIn('id', $notIds)
                      ->orderBy('created_at', 'desc')
                      ->limit(6)
                      ->get()->toArray();

        $today = date("Y-m-d H:i:s");
        $query = new Campaign();
        $query = $query->with('bannerDesktop');
        $query = $query->with('bannerMobile');
        $query = $query->with('cardImage');
        $query = $query->where('draft', 'n');
        $query = $query->where('show_to_home_banner', 'y');
        $query = $query->where('start_date', '<=', $today);
        $query = $query->where('end_date', '>=', $today);
        $query = $query->orderBy('pin_to_home', 'DESC')
                       ->orderBy('created_at', 'DESC');
        $query = $query->get()->toArray();

        $return = new stdClass();
        $return->banners = $banners;
        $return->highlights = $highlights;
        $return->allNewsIds = array_merge(array_column($geral, 'id'), $notIds);
        $return->geral = $geral;

        return $return;
    }

    public function related(Request $request)
    {
        $perPage = $request->input('perPage');
        $notNews = $request->input('notNews');
        $notNews = News::find($request->input('notNews'));
        $news = News::with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews')
                    ->where('topper', $notNews->topper)
                    ->where('draft', 'n')
                    ->whereNotIn('id', [$notNews->id])
                    ->orderBy('created_at', 'desc')
                    ->limit($perPage)
                    ->get();

        return $news;
    }

    public function relatedDepartment(Request $request)
    {
        // $perPage = $request->input('perPage');
        // $notNews = $request->input('notNews');
        $departmentId = $request->input('department_id');
        $limit = $request->input('limit');
        $news = News::with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments')
                    ->where('draft', 'n')
                    ->whereHas('departments', function ($query) use ($departmentId) {
                        $query->where('departments.id', $departmentId);
                    })
                    ->orderBy('created_at', 'desc')
                    ->limit($limit)
                    ->get();

        return $news;
    }

    public function get(Request $request)
    {
        $id = $request->input('id');

        // $news = News::find($id)->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments', 'banks');
        $news = News::where('id', $id)
                    ->with('bannerDesktop', 'bannerMobile', 'imageNews', 'audioNews', 'departments', 'banks')
                    ->where('draft', 'n')
                    ->first();

        return $news;
    }
}
