<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Division;
use App\Http\Requests\UserRequest;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        // dd($request);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        $divisions = Division::find($request->divisions);
        $user->divisions()->attach($divisions);

        return redirect('/users/list')->with('status', 'User created!');
    }

    public function create()
    {
        $roles = Role::all();
        $divisions = Division::all();

        return view('users.create', compact('roles', 'divisions'));
    }

    public function edit(string $id)
    {
        $users = User::find($id);
        $roles = Role::all();
        $divisions = Division::all();

        $userDivisions = $users->divisions()->pluck('divisions.id')->toArray();

        return view('users.edit', compact('users', 'roles', 'divisions', 'userDivisions'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $user->find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        $divisions = Division::find($request->divisions);
        $user->find($request->id)->divisions()->syncWithoutDetaching($divisions);

        return redirect('/users/list')->with('status', 'User updated!');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->find($request->id)->divisions()->detach();

        $user = User::find($request->id)->delete();

        return redirect('/users/list')->with('status', 'User deleted!');
    }
}