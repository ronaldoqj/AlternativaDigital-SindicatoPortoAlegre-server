<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function list(Request $request)
    {
        return Bank::orderBy('name')->get();
    }

    public function manageList()
    {
        return Bank::withCount('directors')->orderBy('name')->get();
    }

    public function add(Request $request)
    {
        return Bank::create($this->validateData($request));
    }

    public function update(Request $request)
    {
        $bank = Bank::findOrFail($request->input('id'));
        $bank->update($this->validateData($request));

        return $bank;
    }

    public function delete(Request $request)
    {
        $bank = Bank::withCount('directors')->findOrFail($request->input('id'));
        abort_if($bank->directors_count > 0, 422, 'Bank has directors');
        $bank->delete();

        return $bank;
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|max:140',
            'description' => 'nullable|string|max:240'
        ]);
    }
}
