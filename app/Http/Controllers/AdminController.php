<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.list', compact('users'));
    }

    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect()->route('main.admin')->with('success', 'Admin created successfully.');
    }

    public function edit(User $admin)
    {
        return view('pages.admin.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'remember_token' => Str::random(60),
        ]);

        return redirect()->route('main.admin')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $admin = User::findOrFail($id);
            $admin->delete();
            return redirect()->route('main.admin')->with('success', 'Admin deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.admin')->with('error', 'Server Error, admin gagal dihapus');
        }
    }
}
