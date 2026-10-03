@extends('layouts.admin')

@section('title', 'Kategoriler | Admin Paneli')
@section('header', 'Kategori Yönetimi')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-3xl font-display font-bold text-slate-900 tracking-tight">Kategoriler (Ürünler)</h1>
        <p class="text-slate-500 mt-2 font-light">Sitedeki tüm hizmet ve ürün kategorilerini yönetin.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="bg-primary hover:bg-primary-hover text-slate-900 font-bold px-6 py-2.5 rounded-xl shadow-[0_4px_14px_0_rgba(255,204,0,0.39)] hover:shadow-[0_6px_20px_rgba(255,204,0,0.23)] hover:-translate-y-0.5 transition-all flex items-center gap-2">
        <i class="fas fa-plus"></i> Yeni Ekle
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider font-semibold">
                    <th class="px-6 py-4">Sıra</th>
                    <th class="px-6 py-4">İkon</th>
                    <th class="px-6 py-4">Kategori Adı</th>
                    <th class="px-6 py-4">Renk Teması</th>
                    <th class="px-6 py-4 text-right">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-900">{{ $category->order }}</td>
                    <td class="px-6 py-4">
                        <div class="w-10 h-10 rounded-lg bg-{{ $category->color_theme }}-50 text-{{ $category->color_theme }}-500 flex items-center justify-center">
                            <i class="fas {{ $category->icon ?? 'fa-folder' }} text-lg"></i>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-800">{{ $category->title }}</p>
                        <p class="text-xs text-slate-500 truncate max-w-xs">{{ $category->description }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-{{ $category->color_theme }}-100 text-{{ $category->color_theme }}-700">
                            {{ $category->color_theme }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-2 text-slate-400 hover:text-blue-500 transition-colors" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors" title="Sil">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                        Henüz kategori eklenmemiş.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
