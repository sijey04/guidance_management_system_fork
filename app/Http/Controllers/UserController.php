<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'in:user,counselor',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'user',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User account created successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'counselor') {
            return back()->with('error', 'You cannot delete a counselor.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted.');
    }
}
