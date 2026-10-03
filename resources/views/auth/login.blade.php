@extends('layouts.app')

@section('title', 'Giriş Yap | Pozitif Kitap ve Kırtasiye')

@section('content')
    <section class="relative min-h-screen flex items-center justify-center px-6 pt-32 pb-20">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.06),transparent_50%)]"></div>

        <div class="w-full max-w-md glass-panel rounded-[2.5rem] border border-slate-200 p-8 md:p-10 shadow-2xl relative z-10">
            <div class="text-center mb-8">
                <i class="fas fa-key text-primary text-3xl mb-4"></i>
                <h2 class="font-display font-extrabold text-2xl text-slate-900">Giriş Yap</h2>
                <p class="text-slate-500 text-xs mt-2">Hesabınıza giriş yapın.</p>
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

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Email or Username -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Kullanıcı Adı veya E-posta</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-user text-sm"></i>
                        </span>
                        <input type="text" name="login_field" value="{{ old('login_field') }}" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Kullanıcı adı veya e-posta" required autofocus>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Şifre</label>
                    </div>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password" class="w-full pl-11 pr-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Şifreniz" required>
                    </div>
                </div>

                <!-- Remember Me & Login button -->
                <button type="submit" class="w-full py-3.5 bg-primary hover:bg-primary-hover text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-primary/10">Giriş Yap</button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center text-xs text-slate-500">
                Hesabınız yok mu? <a href="{{ route('register') }}" class="text-primary font-bold hover:underline">Şimdi Kayıt Olun</a>
            </div>
        </div>
    </section>
@endsection
