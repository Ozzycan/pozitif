<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('hakkimizda');
    }

    public function products()
    {
        $categories = \App\Models\Category::orderBy('order')->get();
        return view('urunler', compact('categories'));
    }

    public function contact()
    {
        return view('iletisim');
    }
}
