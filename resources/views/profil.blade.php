@extends('layouts.app')

@section('title', 'Profilim | Pozitif Kitap ve Kırtasiye')

@section('content')
<section class="relative min-h-screen py-32 px-6">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.04),transparent_50%)]"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        
        <!-- Header -->
        <div class="mb-10 p-8 md:p-10 glass-panel rounded-[2.5rem] border border-slate-200 shadow-xl flex flex-col md:flex-row justify-between items-center gap-6 glass-card-glow">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-primary to-amber-300 text-slate-900 flex items-center justify-center font-display font-extrabold text-4xl shadow-lg shadow-primary/30">
                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </div>
                <div>
                    <span class="text-primary font-display font-bold text-xs uppercase tracking-widest block mb-1">Hesap Detayları</span>
                    <h1 class="font-display font-extrabold text-3xl md:text-4xl text-slate-900">Hoş Geldin, {{ Auth::user()->username }}</h1>
                </div>
            </div>
            <div>
                <a href="{{ route('logout') }}" class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider text-red-500 bg-red-50 hover:bg-red-100 border border-red-100 transition-colors shadow-sm inline-flex items-center">
                    <i class="fas fa-sign-out-alt mr-2"></i> Çıkış Yap
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 text-sm p-5 rounded-2xl flex items-center gap-3">
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-8 bg-red-500/10 border border-red-500/20 text-red-500 text-sm p-5 rounded-2xl flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-xl"></i>
                <div class="font-medium flex flex-col">
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Settings -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Profile Information -->
                <div class="glass-panel rounded-[2rem] border border-slate-200 p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-500 flex items-center justify-center">
                            <i class="fas fa-user-edit text-lg"></i>
                        </div>
                        <h2 class="font-display font-bold text-xl text-slate-900">Profil Bilgileri</h2>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Kullanıcı Adı</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <i class="fas fa-user text-sm"></i>
                                    </span>
                                    <input type="text" name="username" value="{{ old('username', Auth::user()->username) }}" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm transition-colors" required>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">E-posta Adresi</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </span>
                                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm transition-colors" required>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl transition-all shadow-md text-sm">
                                Bilgileri Güncelle
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password -->
                <div class="glass-panel rounded-[2rem] border border-slate-200 p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center">
                            <i class="fas fa-lock text-lg"></i>
                        </div>
                        <h2 class="font-display font-bold text-xl text-slate-900">Şifre Değiştir</h2>
                    </div>

                    <form action="{{ route('profile.password') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Mevcut Şifre</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <i class="fas fa-key text-sm"></i>
                                </span>
                                <input type="password" name="current_password" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm transition-colors" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Yeni Şifre</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <i class="fas fa-lock text-sm"></i>
                                    </span>
                                    <input type="password" name="password" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm transition-colors" required>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Yeni Şifre (Tekrar)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <i class="fas fa-lock text-sm"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm transition-colors" required>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl transition-all shadow-md text-sm">
                                Şifreyi Güncelle
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Right Column: Info & Orders -->
            <div class="space-y-8">
                
                <!-- Account Status -->
                <div class="glass-panel rounded-[2rem] border border-slate-200 p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="font-display font-bold text-lg text-slate-900">Hesap Durumu</h2>
                        <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-bold border border-emerald-100">Aktif</span>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-3 border-b border-slate-100">
                            <span class="text-slate-500 text-sm">Kayıt Tarihi</span>
                            <span class="text-slate-900 font-medium text-sm">{{ Auth::user()->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between py-3 border-b border-slate-100">
                            <span class="text-slate-500 text-sm">Rol</span>
                            <span class="text-slate-900 font-medium text-sm">
                                @if(Auth::user()->is_admin)
                                    <span class="text-amber-600">Yönetici</span>
                                @else
                                    Müşteri
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Orders Placeholder -->
                <div class="glass-panel rounded-[2rem] border border-slate-200 p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="font-display font-bold text-lg text-slate-900">Son Siparişler</h2>
                        <a href="{{ route('products') }}" class="text-xs font-bold text-primary hover:underline">Tümünü Gör</a>
                    </div>
                    
                    <div class="flex flex-col items-center justify-center py-8 text-center">
                        <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mb-4 border border-slate-100">
                            <i class="fas fa-box-open text-2xl text-slate-300"></i>
                        </div>
                        <p class="text-slate-500 text-sm mb-1">Henüz hiç siparişiniz yok.</p>
                        <a href="{{ route('products') }}" class="text-primary font-medium text-sm hover:underline">Alışverişe Başla</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
