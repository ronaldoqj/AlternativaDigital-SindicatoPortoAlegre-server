<?php

namespace App\Http\Controllers\Site\Insurance;

use App\Http\Controllers\Controller;
use App\Models\CategoryInsurance;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function list()
    {
        $categoryInsurance = CategoryInsurance::get()->toArray();
        $entity = Insurance::with('categories')
                           ->orderBy('category_id', 'ASC')
                           ->orderBy('title', 'ASC')
                           ->get()
                           ->toArray();

        $entity = array_map(function($entity) {
            return [
                'id' => $entity['id'],
                'category_id' => $entity['category_id'],
                'title' => $entity['title'],
                'subtitle' => $entity['subtitle'],
                'description' => $entity['description'],
                'phone' => $entity['phone'],
                'phone2' => $entity['phone2'],
                'address' => $entity['address'],
                'address2' => $entity['address2'],
                'mail' => $entity['mail'],
                'site' => $entity['site'],
                'socialMedia' => [
                    'facebook' => $entity['facebook'],
                    'instagram' => $entity['instagram'],
                    'x' => $entity['x'],
                    'whatsapp' => $entity['whatsapp'],
                    'youtube' => $entity['youtube']
                ]
            ];
        }, $entity);

        $newCategory = [];

        foreach ($categoryInsurance as $category)
        {
            $category['list'] = [];

            foreach ($entity as $key => $insurance)
            {
                if ($insurance['category_id'] === $category['id'])
                {
                    $category['list'][] = $insurance;
                }
            }

            $newCategory[] = $category;
        }

        return $newCategory;
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
}
