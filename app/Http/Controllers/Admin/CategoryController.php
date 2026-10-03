<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color_theme' => 'required|string|max:50',
            'link' => 'nullable|url|max:255',
            'order' => 'integer',
            'tags' => 'nullable|string'
        ]);

        if (!empty($validated['tags'])) {
            // Split by comma and trim
            $tagsArray = array_map('trim', explode(',', $validated['tags']));
            $validated['tags'] = $tagsArray;
        } else {
            $validated['tags'] = null;
        }

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori başarıyla eklendi.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'color_theme' => 'required|string|max:50',
            'link' => 'nullable|url|max:255',
            'order' => 'integer',
            'tags' => 'nullable|string'
        ]);

        if (!empty($validated['tags'])) {
            $tagsArray = array_map('trim', explode(',', $validated['tags']));
            $validated['tags'] = $tagsArray;
        } else {
            $validated['tags'] = null;
        }

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori silindi.');
    }
}
