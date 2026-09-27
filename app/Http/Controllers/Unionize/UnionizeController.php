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

    public function list(Request $request)
    {
        $searchWords = $request->input('searchWords');
        $perPage = $request->input('perPage', 12);

        return [
            'listStarted' => $this->listByStatus('started', $searchWords, $perPage, $request->input('startedPage', 1)),
            'listCompleted' => $this->listByStatus('completed', $searchWords, $perPage, $request->input('completedPage', 1)),
            'listConfirmed' => $this->listByStatus('confirmed', $searchWords, $perPage, $request->input('confirmedPage', 1))
        ];
    }

    private function listByStatus(string $status, ?string $searchWords, int $perPage, int $page)
    {
        $unionized = Unionized::where('status', $status)
                              ->orderBy('created_at', 'desc');

        if ($searchWords) {
            $unionized->where(function ($query) use ($searchWords) {
                $query->where('name', 'like', "%{$searchWords}%")
                      ->orWhere('cpf', 'like', "%{$searchWords}%")
                      ->orWhere('rg', 'like', "%{$searchWords}%")
                      ->orWhere('email', 'like', "%{$searchWords}%")
                      ->orWhere('commercial_email', 'like', "%{$searchWords}%")
                      ->orWhere('bank', 'like', "%{$searchWords}%")
                      ->orWhere('registration', 'like', "%{$searchWords}%");
            });
        }

        return $unionized->paginate($perPage, ['*'], "{$status}Page", $page);
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

    public function downloadFileAssinedWithUnionEnrolment(Request $request, string $id)
    {
        // return view('unionize_with_code', ['code' => '12313121', 'pdfPath' => '/temporary/test.pdf']);
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

        // $file_path = public_path("{$unionizedFile->path}/{$unionizedFile->file_name}");
        $file_path = "/{$unionizedFile->path}/{$unionizedFile->file_name}";
        // $file_name = "{$id}_{$unionizedFile->name}.{$unionizedFile->extension}";
        $file_name = "{$id}_{$unionizedFile->name}_with_code.png";
        $codeUnionEnrolment = $unionized->union_enrolment_id ?? '';

        return view('unionize_with_code', ['code' => $codeUnionEnrolment, 'pdfPath' => $file_path, 'fileName' => $file_name]);
        return response()->download($file_path, $file_name);
    }

    public function updateConfirmedStatus(Request $request) {
        $unionized = new Unionized();
        $unionized = $unionized->find($request->input('id'));
        $status = $request->input('status') ?? null;

        $unionized->status = $status === 'started' ? 'completed' : 'confirmed';
        $unionized->union_enrolment_id = $request->input('unionEnrolment') ?? null;
        return $unionized->save();
    }
}

//
