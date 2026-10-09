<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private function profiles(Request $request): array
    {
        abort_unless(in_array($request->user()->profile, ['master', 'administrator'], true), 403);

        return $request->user()->profile === 'master'
            ? ['master', 'administrator', 'normal']
            : ['administrator', 'normal'];
    }

    private function accessibleUsers(Request $request): Builder
    {
        $profiles = $this->profiles($request);

        return $request->user()->profile === 'master'
            ? User::query()
            : User::whereIn('profile', $profiles);
    }

    public function list(Request $request)
    {
        return $this->accessibleUsers($request)->orderBy('name')->get();
    }

    public function get(Request $request)
    {
        return $this->accessibleUsers($request)->findOrFail($request->input('id'));
    }

    public function add(Request $request)
    {
        $profiles = $this->profiles($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profile' => ['required', Rule::in($profiles)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->profile = $data['profile'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return $user;
    }

    public function update(Request $request)
    {
        $user = $this->accessibleUsers($request)->findOrFail($request->input('id'));
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profile' => ['required', Rule::in($this->profiles($request))],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
        ]);

        $user->name = $data['name'];
        $user->profile = $data['profile'];
        $user->email = $data['email'];
        if ($request->filled('password')) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return $user;
    }

    public function delete(Request $request)
    {
        $user = $this->accessibleUsers($request)->findOrFail($request->input('id'));
        abort_if($request->user()->profile === 'master' && $request->user()->id === $user->id, 403);
        $user->delete();

        return response()->json(['error' => []]);
    }
}
