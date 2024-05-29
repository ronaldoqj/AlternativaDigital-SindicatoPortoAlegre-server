<?php

namespace App\Http\Controllers\Unionize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unionized;
use App\Models\UnionizedFile;

class UnionizeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    public function list()
    {
        $unionized = new Unionized();
        $findUnionized = $unionized->orderBy('created_at', 'desc')
                                   ->get()
                                   ->toArray();

        return $findUnionized;
    }

    public function downloadFileAssined(Request $request, string $id)
    {
        $unionized = new Unionized();
        $unionized = $unionized->find($id);

        if (!$unionized) {
            abort(500, 'Not found');
        }

        $unionizedFile = new UnionizedFile();
        $unionizedFile = $unionizedFile->find($unionized->unionized_file_id);

        if (!$unionizedFile) {
            abort(500, 'Not found');
        }

        $file_path = public_path("{$unionizedFile->path}/{$unionizedFile->file_name}");
        $file_name = "{$id}_{$unionizedFile->name}.{$unionizedFile->extension}";

        return response()->download($file_path, $file_name);
    }

    public function updateConfirmedStatus(Request $request) {
        $unionized = new Unionized();
        $unionized = $unionized->find($request->input('id'));

        $unionized->status = 'confirmed';
        return $unionized->save();
    }
}

//
