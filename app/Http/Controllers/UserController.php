<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Show only Sub Admins
        $users = User::where('role', 'sub_admin')->get();
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'in:sub_admin,admin', // updated validation
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'sub_admin', // default to sub_admin
            'password' => Hash::make($request->password),
        ]);

       return redirect()->route('semester.index')->with([
    'success' => 'User account created successfully.',
    'tab' => 'accounts'
]);

    }

    public function destroy(User $user)
    {
        // Prevent deleting Admins
        if ($user->role === 'admin') {
            return back()->with('error', 'You cannot delete an admin.');
        }

        $user->delete();
        return redirect()->route('semester.index')->with([
    'success' => 'User deleted.',
    'tab' => 'accounts'
]);
    }
}
