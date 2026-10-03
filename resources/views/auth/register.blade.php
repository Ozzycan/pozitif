@extends('layouts.app')

@section('title', 'Kayıt Ol | Pozitif Kitap ve Kırtasiye')

@section('content')
    <section class="relative min-h-screen flex items-center justify-center px-6 pt-32 pb-20">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.06),transparent_50%)]"></div>

        <div class="w-full max-w-md glass-panel rounded-[2.5rem] border border-slate-200 p-8 md:p-10 shadow-2xl relative z-10">
            <div class="text-center mb-8">
                <i class="fas fa-user-plus text-primary text-3xl mb-4"></i>
                <h2 class="font-display font-extrabold text-2xl text-slate-900">Hesap Oluştur</h2>
                <p class="text-slate-500 text-xs mt-2">Kayıt olarak aramıza katılın.</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-xs p-4 rounded-xl mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Username -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Kullanıcı Adı</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input type="text" name="username" value="{{ old('username') }}" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Kullanıcı adınız" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">E-posta Adresi</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="e.g. adiniz@email.com" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Şifre</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="En az 6 karakter" required>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Şifre Tekrarı</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password_confirmation" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Şifrenizi doğrulayın" required>
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 bg-primary hover:bg-primary-hover text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-primary/10 mt-6">Kayıt Ol</button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center text-xs text-slate-500">
                Zaten hesabınız var mı? <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Giriş Yapın</a>
            </div>
        </div>
    </section>
@endsection
