@extends('layouts.admin')

@section('title', 'Dashboard | Admin Paneli')
@section('header', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-display font-bold text-slate-900 tracking-tight">Sistem Özeti</h1>
    <p class="text-slate-500 mt-2 font-light">Pozitif Kırtasiye yönetim panelinize hoş geldiniz. Tüm modülleri buradan yönetebilirsiniz.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Stat Card: Categories -->
    <div class="group relative bg-white/70 backdrop-blur-xl border border-white/40 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-[2rem] p-8 overflow-hidden transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_8px_40px_rgb(0,0,0,0.08)]">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest">Kategoriler</p>
                <p class="text-5xl font-display font-bold text-slate-900 mt-2">{{ $categoriesCount ?? 0 }}</p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-blue-500 shadow-inner">
                <i class="fas fa-tags text-2xl"></i>
            </div>
        </div>
        <div class="relative z-10 mt-6 pt-6 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-blue-600">
            <a href="{{ route('admin.categories.index') }}" class="group/link flex items-center gap-2 w-full justify-between">
                <span>Kategorileri Yönet</span>
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center group-hover/link:bg-blue-600 group-hover/link:text-white transition-all">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Stat Card: Users -->
    <div class="group relative bg-white/70 backdrop-blur-xl border border-white/40 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-[2rem] p-8 overflow-hidden transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_8px_40px_rgb(0,0,0,0.08)]">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest">Kullanıcılar</p>
                <p class="text-5xl font-display font-bold text-slate-900 mt-2">{{ $usersCount ?? 0 }}</p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-50 to-purple-100 flex items-center justify-center text-purple-500 shadow-inner">
                <i class="fas fa-users text-2xl"></i>
            </div>
        </div>
        <div class="relative z-10 mt-6 pt-6 border-t border-slate-100 flex items-center justify-between text-sm font-bold text-purple-600">
            <a href="{{ route('admin.users.index') }}" class="group/link flex items-center gap-2 w-full justify-between">
                <span>Kullanıcıları Yönet</span>
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center group-hover/link:bg-purple-600 group-hover/link:text-white transition-all">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- Stat Card: Settings -->
    <div class="group relative bg-slate-900 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-[2rem] p-8 overflow-hidden transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_8px_40px_rgb(0,0,0,0.08)] flex flex-col justify-between">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-primary/20 rounded-full mix-blend-screen filter blur-3xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-primary mb-6">
                <i class="fas fa-cog text-xl"></i>
            </div>
            <h3 class="text-2xl font-display font-bold text-white mb-2">Site Ayarları</h3>
            <p class="text-slate-400 text-sm leading-relaxed">İletişim, sosyal medya ve genel site yapılandırmasını buradan düzenleyin.</p>
        </div>
        <div class="relative z-10 mt-6 pt-6 border-t border-slate-800 flex items-center justify-between text-sm font-bold text-primary">
            <a href="{{ route('admin.settings.index') }}" class="group/link flex items-center gap-2 w-full justify-between">
                <span>Ayarlara Git</span>
                <div class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center group-hover/link:bg-primary group-hover/link:text-slate-900 transition-all">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
