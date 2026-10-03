@extends('layouts.admin')

@section('title', 'Yeni Kategori Ekle | Admin Paneli')
@section('header', 'Yeni Kategori Ekle')

@section('content')
<div class="mb-6 flex items-center">
    <a href="{{ route('admin.categories.index') }}" class="text-slate-500 hover:text-slate-800 mr-4">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h3 class="text-lg font-semibold text-slate-800">Kategori Ekle</h3>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden max-w-3xl">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6 md:p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="col-span-1 md:col-span-2">
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Kategori Adı *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="col-span-1 md:col-span-2">
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Açıklama</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="icon" class="block text-sm font-medium text-slate-700 mb-1">İkon (FontAwesome)</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', 'fa-folder') }}" placeholder="fa-book-open" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                <p class="text-xs text-slate-500 mt-1">Örn: fa-book-open, fa-pen-fancy</p>
                @error('icon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="color_theme" class="block text-sm font-medium text-slate-700 mb-1">Renk Teması *</label>
                <select id="color_theme" name="color_theme" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all bg-white">
                    <option value="amber" {{ old('color_theme') == 'amber' ? 'selected' : '' }}>Sarı (Amber)</option>
                    <option value="blue" {{ old('color_theme') == 'blue' ? 'selected' : '' }}>Mavi (Blue)</option>
                    <option value="violet" {{ old('color_theme') == 'violet' ? 'selected' : '' }}>Mor (Violet)</option>
                    <option value="emerald" {{ old('color_theme') == 'emerald' ? 'selected' : '' }}>Yeşil (Emerald)</option>
                    <option value="rose" {{ old('color_theme') == 'rose' ? 'selected' : '' }}>Pembe (Rose)</option>
                    <option value="fuchsia" {{ old('color_theme') == 'fuchsia' ? 'selected' : '' }}>Fuşya (Fuchsia)</option>
                    <option value="yellow" {{ old('color_theme') == 'yellow' ? 'selected' : '' }}>Sarı (Yellow)</option>
                    <option value="sky" {{ old('color_theme') == 'sky' ? 'selected' : '' }}>Açık Mavi (Sky)</option>
                    <option value="red" {{ old('color_theme') == 'red' ? 'selected' : '' }}>Kırmızı (Red)</option>
                </select>
                @error('color_theme') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="col-span-1 md:col-span-2">
                <label for="tags" class="block text-sm font-medium text-slate-700 mb-1">Etiketler (Virgülle Ayırın)</label>
                <input type="text" id="tags" name="tags" value="{{ old('tags') }}" placeholder="AYT Kitapları, TYT Kitapları, Deneme" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                @error('tags') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-slate-700 mb-1">Yönlendirme Linki</label>
                <input type="text" id="link" name="link" value="{{ old('link') }}" placeholder="https://pozitifkirtasiye.com.tr/kategori" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                @error('link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="order" class="block text-sm font-medium text-slate-700 mb-1">Sıralama</label>
                <input type="number" id="order" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all">
                @error('order') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end border-t border-slate-100 pt-6 mt-6">
            <button type="submit" class="bg-primary hover:bg-primary-hover text-slate-900 font-bold py-2.5 px-6 rounded-lg transition-colors flex items-center gap-2">
                <i class="fas fa-save"></i> Kaydet
            </button>
        </div>
    </form>
</div>
@endsection
