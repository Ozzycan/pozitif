<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        $usersCount = \App\Models\User::count();
        return view('admin.dashboard', compact('categoriesCount', 'usersCount'));
    }
}
