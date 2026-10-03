<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Kendi yetkinizi değiştiremezsiniz.');
        }
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back()->with('success', 'Kullanıcı yetkisi güncellendi.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Kendinizi silemezsiniz.');
        }
        $user->delete();
        return back()->with('success', 'Kullanıcı silindi.');
    }
}
