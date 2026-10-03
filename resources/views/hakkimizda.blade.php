@extends('layouts.app')

@section('title', 'Hakkımızda | Pozitif Kitap ve Kırtasiye')

@section('content')
    <!-- Hero Header -->
    <section class="relative min-h-[45vh] flex flex-col justify-center items-center overflow-hidden px-6 pt-32 pb-12">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.06),transparent_50%)]"></div>
        <div class="max-w-4xl mx-auto text-center z-10 relative">
            <h1 class="font-display font-extrabold text-4xl md:text-6xl text-slate-900 tracking-tight mb-4">
                Hakkımızda
            </h1>
            <p class="text-slate-600 text-lg font-light max-w-xl mx-auto">
                Pozitif bir gelecek için, Pozitif adımlar atıyoruz.
            </p>
        </div>
    </section>

    <!-- History / hikaye -->
    <section class="relative py-20 px-6 z-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <!-- Text -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-xs font-semibold uppercase tracking-wider text-primary">
                        Yolculuğumuz
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-900">Hikayemiz</h2>
                    <p class="text-slate-600 font-light leading-relaxed">
                        Pozitif Kitap ve Kırtasiye, 20 yılı aşkın süredir kitap tutkunlarına, öğrencilere ve sanatseverlere kapılarını açmış köklü bir kuruluştur. Kurulduğumuz ilk günden beri amacımız, bilgiye erişimi kolaylaştırmak ve okumanın getirdiği o "pozitif" enerjiyi herkese aşılamaktır.
                    </p>
                    <p class="text-slate-500 font-light leading-relaxed">
                        Küçük bir dükkanla başlayan yolculuğumuz, bugün binlerce çeşit ürün ve binlerce mutlu müşteri ile devam ediyor.
                    </p>
                </div>

                <!-- Image -->
                <div class="lg:col-span-5 relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 to-transparent rounded-[2rem] blur-[20px] -z-10"></div>
                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=800" alt="Hikayemiz" class="w-full rounded-[2rem] border border-slate-200 shadow-2xl">
                </div>
            </div>

            <!-- Mission & Vision Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-24">
                <div class="p-10 glass-panel rounded-[2rem] relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-[40px] pointer-events-none"></div>
                    <h3 class="text-2xl font-bold text-primary mb-4 font-display">Misyonumuz</h3>
                    <p class="text-slate-600 font-light leading-relaxed text-sm">
                        Her yaştan bireyin eğitim, culture ve sanatsal ihtiyaçlarını, en kaliteli ürünler ve en iyi hizmet anlayışıyla karşılayarak toplumsal gelişime ve yaratıcılığa katkıda bulunmak.
                    </p>
                </div>
                <div class="p-10 glass-panel rounded-[2rem] border-primary/30 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-[40px] pointer-events-none"></div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 font-display">Vizyonumuz</h3>
                    <p class="text-slate-600 font-light leading-relaxed text-sm">
                        Kitap ve kırtasiye sektöründe yenilikçi yaklaşımlarımızla Türkiye'nin en sevilen, en güvenilen ve en öncü yaratıcı markası olmak.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values / Değerlerimiz -->
    <section class="relative py-24 px-6 bg-slate-50 border-t border-slate-200/60 z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-block px-3 py-1 rounded-full bg-primary/10 border border-primary/20 mb-4 text-xs font-semibold uppercase tracking-wider text-primary">
                    İlkelerimiz
                </div>
                <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-900">Değerlerimiz</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1 -->
                <div class="text-center p-8 glass-panel rounded-[2rem]">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fas fa-heart text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2 font-display uppercase tracking-wider">Güven</h4>
                    <p class="text-slate-600 text-sm font-light">Dürüstlükten ve şeffaflıktan asla ödün vermeyiz.</p>
                </div>

                <!-- Value 2 -->
                <div class="text-center p-8 glass-panel rounded-[2rem]">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fas fa-star text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2 font-display uppercase tracking-wider">Kalite</h4>
                    <p class="text-slate-600 text-sm font-light">Müşterilerimize sadece en seçkin markaları sunarız.</p>
                </div>

                <!-- Value 3 -->
                <div class="text-center p-8 glass-panel rounded-[2rem]">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fas fa-smile text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2 font-display uppercase tracking-wider">Pozitiflik</h4>
                    <p class="text-slate-600 text-sm font-light">Güler yüzlü hizmet, kurum kültürümüzün temelidir.</p>
                </div>

                <!-- Value 4 -->
                <div class="text-center p-8 glass-panel rounded-[2rem]">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mx-auto mb-6">
                        <i class="fas fa-sync text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-slate-800 mb-2 font-display uppercase tracking-wider">Yenilik</h4>
                    <p class="text-slate-600 text-sm font-light">Yaratıcı teknolojileri ve trendleri yakından izleriz.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
