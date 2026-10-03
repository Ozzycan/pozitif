@extends('layouts.app')

@section('title', 'Pozitif Kitap ve Kırtasiye | Geleceğe Pozitif Bir Adım')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col justify-center items-center overflow-hidden px-6 pt-32 pb-20">
        <!-- Ambient decorative overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,204,0,0.06),transparent_50%)]"></div>

        <div class="max-w-5xl mx-auto text-center z-10 relative">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border-slate-200 mb-8 animate-pulse">
                <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                <span class="text-xs font-semibold tracking-widest uppercase text-slate-800 font-display">Geleceğin Eğitim Platformu</span>
            </div>

            <!-- Title -->
            <h1 class="font-display font-extrabold text-5xl md:text-8xl tracking-tighter leading-tight mb-8 text-slate-900 select-none">
                Geleceğe <span class="text-gradient-gold">Pozitif</span><br />Bir Adım Atın.
            </h1>

            <!-- Description -->
            <p class="max-w-2xl mx-auto text-base md:text-xl text-slate-600 font-light tracking-wide leading-relaxed mb-12">
                Pozitif Kitap ve Kırtasiye olarak, eğitimin ve yaratıcılığın yanındayız. En kaliteli kırtasiye ürünleri ve zengin kitap arşivimizle hizmetinizdeyiz.
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('products') }}" class="w-full sm:w-auto group relative inline-flex items-center justify-center px-8 py-4 font-semibold text-slate-900 transition-all duration-300 ease-out rounded-full bg-gradient-to-r from-primary to-amber-300 hover:from-amber-300 hover:to-primary shadow-lg shadow-primary/20 overflow-hidden">
                    <span class="relative flex items-center gap-3">
                        Kataloğu İncele
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                </a>

            </div>
        </div>

        <!-- Scroll down indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-60 hover:opacity-100 transition-opacity">
            <span class="text-[10px] tracking-widest uppercase font-display text-slate-500">Keşfet</span>
            <div class="w-6 h-10 rounded-full border-2 border-slate-400 flex justify-center p-1.5">
                <div class="w-1.5 h-1.5 bg-primary rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section class="relative py-28 px-6 bg-slate-50/50 border-t border-slate-200/50 z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20">
                <div class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    Hizmetlerimiz
                </div>
                <h2 class="font-display text-3xl md:text-5xl font-bold tracking-tight text-slate-900">
                    Neler Sunuyoruz?
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Book Card -->
                <div class="group p-8 glass-panel glass-panel-hover rounded-[2rem] transition-all duration-500 hover:scale-[1.02] relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full blur-[50px] pointer-events-none"></div>
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-slate-900 transition-all duration-300">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 font-display uppercase tracking-wide">Zengin Kitap Arşivi</h3>
                    <p class="text-slate-600 text-sm leading-relaxed font-light">
                        Edebiyattan eğitime, çocuk kitaplarından akademik yayınlara kadar geniş bir yelpazede binlerce kitap seçeneği ile kütüphanenizi zenginleştirin.
                    </p>
                </div>

                <!-- Stationery Card -->
                <div class="group p-8 glass-panel glass-panel-hover rounded-[2rem] transition-all duration-500 hover:scale-[1.02] relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full blur-[50px] pointer-events-none"></div>
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-slate-900 transition-all duration-300">
                        <i class="fas fa-pen-fancy text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 font-display uppercase tracking-wide">Okul & Ofis Kırtasiye</h3>
                    <p class="text-slate-600 text-sm leading-relaxed font-light">
                        Dünya çapında seçkin markaların en kaliteli okul araç gereçlerini, ofis sarf malzemelerini ve ergonomik organizasyon araçlarını sunuyoruz.
                    </p>
                </div>

                <!-- Art Materials Card -->
                <div class="group p-8 glass-panel glass-panel-hover rounded-[2rem] transition-all duration-500 hover:scale-[1.02] relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full blur-[50px] pointer-events-none"></div>
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-8 group-hover:bg-primary group-hover:text-slate-900 transition-all duration-300">
                        <i class="fas fa-palette text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 font-display uppercase tracking-wide">Sanatsal Malzemeler</h3>
                    <p class="text-slate-600 text-sm leading-relaxed font-light">
                        Sanatseverler, profesyonel ressamlar ve hobi sahipleri için zengin pigmentli boyalar, yüksek kaliteli tuval ve çizim araçları.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Story Section -->
    <section class="relative py-28 px-6 lg:px-12 bg-white border-t border-slate-200/50 z-10 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <!-- Left Image Box -->
            <div class="lg:col-span-5 relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 to-transparent rounded-[2.5rem] blur-[30px] -z-10"></div>
                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=800" alt="About" class="w-full rounded-[2.5rem] border border-slate-200 shadow-2xl">
                <!-- Floating Badge -->
                <div class="absolute -bottom-6 -right-6 glass-panel rounded-3xl p-6 border-slate-200 shadow-2xl flex flex-col items-center">
                    <span class="text-primary font-display font-extrabold text-4xl leading-none">20+</span>
                    <span class="text-slate-600 text-xs mt-1 font-semibold">Yıllık Tecrübe</span>
                </div>
            </div>

            <!-- Right Info Column -->
            <div class="lg:col-span-7 space-y-8">
                <div class="space-y-4">
                    <div class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-xs font-semibold uppercase tracking-wider text-primary">
                        Vizyonumuz
                    </div>
                    <h2 class="font-display text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                        Pozitif Bakış Açısı
                    </h2>
                </div>

                <p class="text-slate-600 font-light leading-relaxed text-base md:text-lg">
                    Müşterilerimize sadece kitap ve kırtasiye malzemesi satmıyoruz; onlara okuma alışkanlıklarını geliştirecekleri, yaratıcı fikirlerini kağıda dökebilecekleri ve hayallerini özgürce tasarlayabilecekleri zengin bir deneyim sunuyoruz.
                </p>

                <p class="text-slate-500 font-light leading-relaxed text-sm">
                    Güler yüzlü hizmetimiz, rekabetçi fiyat politikamız ve her yaştan okura hitap eden geniş yayın ağımızla alışveriş deneyimini pozitif bir sürece dönüştürüyoruz.
                </p>


        </div>
    </section>

    <!-- Corporate Solutions Banner -->
    <section class="relative py-20 px-6 text-center bg-gradient-to-b from-slate-50 to-slate-100 border-t border-slate-200/60 overflow-hidden z-10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,204,0,0.04),transparent_70%)]"></div>
        <div class="max-w-4xl mx-auto relative z-10">
            <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-900 mb-4">Kurumsal Çözümler mi Arıyorsunuz?</h2>
            <p class="text-slate-600 text-base md:text-lg mb-8 max-w-xl mx-auto opacity-95">Ofis ihtiyaçlarınız veya toplu kitap siparişleriniz için kurumsal ekibimizle iletişime geçin, size özel teklifimizi hazırlayalım.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 font-bold text-slate-900 bg-gradient-to-r from-primary to-amber-300 hover:from-amber-300 hover:to-primary rounded-full shadow-lg shadow-primary/20 hover:scale-[1.03] transition-all">Hemen İletişime Geçin</a>
        </div>
    </section>
@endsection
