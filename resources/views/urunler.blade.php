@extends('layouts.app')

@section('title', 'Ürünlerimiz | Pozitif Kitap ve Kırtasiye')

@section('content')
    <!-- Hero Header -->
    <section class="relative min-h-[45vh] flex flex-col justify-center items-center overflow-hidden px-6 pt-32 pb-12">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.06),transparent_50%)]"></div>
        <div class="max-w-4xl mx-auto text-center z-10 relative">
            <h1 class="font-display font-extrabold text-4xl md:text-6xl text-slate-900 tracking-tight mb-4">
                Ürün Kataloğu
            </h1>
            <p class="text-slate-600 text-lg font-light max-w-xl mx-auto">
                Geniş ürün yelpazemizle ihtiyacınız olan tüm kitap, kırtasiye, çanta, oyuncak ve sanatsal materyallere tek tıkla ulaşın.
            </p>
        </div>
    </section>

    <!-- Product Catalog Section -->
    <section class="relative py-12 px-6 z-10">
        <div class="max-w-7xl mx-auto">
            <!-- Filter Bar & Search -->
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-16 p-4 glass-panel rounded-[2rem] border-slate-200">
                <!-- Filter categories -->
                <div class="flex items-center gap-2 overflow-x-auto w-full lg:w-auto py-1 scrollbar-thin">
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 active-filter whitespace-nowrap" data-filter="all">Tümü</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="kitap">Kitap</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="kirtasiye">Kırtasiye</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="canta">Çanta</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="oyuncak">Oyuncak</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="sanat">Sanat</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="hediye">Hediye</button>
                    <button class="filter-btn px-5 py-2.5 rounded-full text-xs font-semibold border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition-all duration-300 whitespace-nowrap" data-filter="diger">Diğer</button>
                </div>

                <!-- Search Input -->
                <div class="relative w-full lg:w-[350px]">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="productSearch" class="w-full pl-11 pr-5 py-3 rounded-full bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-sm transition-all" placeholder="Ürün veya kategori ara...">
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="productGrid">

                @forelse($categories as $category)
                <a href="{{ $category->link ?? '#' }}" target="_blank" class="product-item group relative w-full bg-white rounded-tl-[2.5rem] rounded-bl-[2.5rem] rounded-br-[2.5rem] rounded-tr-xl overflow-hidden transition-all duration-500 hover:-translate-y-2 border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_40px_rgba(0,0,0,0.08)] flex flex-col h-full" data-category="diger" data-name="{{ $category->title }}">
                    
                    <!-- Top area with gradient -->
                    <div class="absolute top-0 left-0 right-0 h-48 bg-gradient-to-b from-{{ $category->color_theme }}-50/80 to-white pointer-events-none"></div>
                    
                    <div class="relative z-10 p-7 flex flex-col h-full">
                        
                        <!-- Header: Badge and Icon -->
                        <div class="flex justify-between items-start mb-8">
                            <!-- Left Badge -->
                            <div class="bg-white/80 backdrop-blur-sm border border-slate-100 px-4 py-1.5 rounded-full shadow-sm">
                                <span class="text-[9px] font-black tracking-widest uppercase text-slate-600">{{ $category->title }}</span>
                            </div>
                            
                            <!-- Right Icon Box -->
                            <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-[0_4px_15px_rgba(0,0,0,0.04)] border border-slate-50 group-hover:scale-105 transition-transform duration-500">
                                <i class="fas {{ $category->icon ?? 'fa-folder' }} text-xl text-{{ $category->color_theme }}-500"></i>
                            </div>
                        </div>

                        <!-- Texts -->
                        <h3 class="text-3xl font-display font-bold text-slate-900 mb-4 tracking-tight">{{ $category->title }}</h3>
                        <p class="text-slate-500 text-[13px] font-normal leading-relaxed mb-6 line-clamp-2">
                            {{ $category->description }}
                        </p>

                        <!-- Tags -->
                        @if(!empty($category->tags) && is_array($category->tags))
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach(array_slice($category->tags, 0, 4) as $tag)
                            <span class="px-3.5 py-1.5 bg-white border border-slate-200 rounded-full text-[10px] font-bold text-slate-600 shadow-sm">{{ trim($tag) }}</span>
                            @endforeach
                            @if(count($category->tags) > 4)
                            <span class="px-3.5 py-1.5 bg-slate-50 border border-slate-200 rounded-full text-[10px] font-bold text-slate-500 shadow-sm">+{{ count($category->tags) - 4 }}</span>
                            @endif
                        </div>
                        @endif

                        <!-- Bottom Action (Dark Circle at bottom right) -->
                        <div class="mt-auto pt-4 flex justify-end">
                            <div class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center group-hover:bg-{{ $category->color_theme }}-500 transition-colors duration-300 shadow-md">
                                <i class="fas fa-arrow-right -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                            </div>
                        </div>

                    </div>
                </a>
                @empty
                <div class="col-span-full py-12 text-center text-slate-500">
                    <i class="fas fa-box-open text-4xl mb-4 text-slate-300"></i>
                    <p>Henüz kategori eklenmemiş.</p>
                </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- Brands Sliding Section -->
    <section class="py-16 bg-white border-t border-b border-slate-200/50 overflow-hidden relative z-10">
        <div class="max-w-7xl mx-auto px-6 mb-10">
            <h3 class="text-xs font-bold text-center text-slate-400 uppercase tracking-widest font-display">En Çok Tercih Edilen Seçkin Markalar</h3>
        </div>
        
        <!-- Scrolling Track -->
        <div class="relative w-full overflow-hidden whitespace-nowrap py-2">
            <!-- Fade overlays -->
            <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>
            
            <div class="inline-flex gap-5 animate-marquee items-stretch">
                <!-- Set 1 -->
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/faber-castell.com" alt="Faber-Castell" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=faber-castell.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">FABER-CASTELL</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/stabilo.com" alt="Stabilo" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=stabilo.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">STABILO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pilotpen.com" alt="Pilot" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pilotpen.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PILOT</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/rotring.com" alt="Rotring" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=rotring.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">ROTRING</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/edding.com" alt="Edding" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=edding.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">EDDING</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/lamy.com" alt="Lamy" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=lamy.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">LAMY</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pentel.com" alt="Pentel" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pentel.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PENTEL</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/schneider-pen.com" alt="Schneider" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=schneider-pen.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">SCHNEIDER</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/tombow.com" alt="Tombow" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=tombow.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">TOMBOW</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/gifrfrotto.com" alt="Giotto" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=ffrila.it&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">GIOTTO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pebeo.com" alt="Pebeo" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pebeo.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PEBEO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/uhu.com" alt="UHU" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=uhu.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">UHU</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/casio.com" alt="Casio" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=casio.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">CASIO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://www.google.com/s2/favicons?domain=ofrfrkyanufrfrsfryayinlari.com&sz=64" alt="Okyanus" class="h-10 w-10 object-contain brand-logo" onerror="this.onerror=null;this.style.display='none'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">OKYANUS</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://www.google.com/s2/favicons?domain=tufrfrdem.com.tr&sz=64" alt="Tudem" class="h-10 w-10 object-contain brand-logo" onerror="this.onerror=null;this.style.display='none'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">TUDEM</span>
                </div>

                <!-- Set 2 (Duplicate for seamless infinite scroll) -->
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/faber-castell.com" alt="Faber-Castell" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=faber-castell.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">FABER-CASTELL</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/stabilo.com" alt="Stabilo" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=stabilo.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">STABILO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pilotpen.com" alt="Pilot" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pilotpen.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PILOT</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/rotring.com" alt="Rotring" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=rotring.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">ROTRING</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/edding.com" alt="Edding" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=edding.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">EDDING</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/lamy.com" alt="Lamy" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=lamy.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">LAMY</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pentel.com" alt="Pentel" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pentel.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PENTEL</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/schneider-pen.com" alt="Schneider" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=schneider-pen.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">SCHNEIDER</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/tombow.com" alt="Tombow" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=tombow.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">TOMBOW</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/gifrfrotto.com" alt="Giotto" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=ffrila.it&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">GIOTTO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/pebeo.com" alt="Pebeo" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=pebeo.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">PEBEO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/uhu.com" alt="UHU" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=uhu.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">UHU</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://logo.clearbit.com/casio.com" alt="Casio" class="h-10 w-10 object-contain brand-logo" onerror="this.src='https://www.google.com/s2/favicons?domain=casio.com&sz=64'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">CASIO</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://www.google.com/s2/favicons?domain=ofrfrkyanufrfrsfryayinlari.com&sz=64" alt="Okyanus" class="h-10 w-10 object-contain brand-logo" onerror="this.onerror=null;this.style.display='none'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">OKYANUS</span>
                </div>
                <div class="brand-card inline-flex flex-col items-center justify-center gap-3 px-6 py-5 bg-slate-50 border border-slate-200/60 rounded-2xl shadow-sm hover:border-primary/40 hover:shadow-lg transition-all duration-300 cursor-pointer shrink-0 min-w-[120px]">
                    <img src="https://www.google.com/s2/favicons?domain=tufrfrdem.com.tr&sz=64" alt="Tudem" class="h-10 w-10 object-contain brand-logo" onerror="this.onerror=null;this.style.display='none'">
                    <span class="text-[10px] font-extrabold text-slate-600 tracking-wider font-display whitespace-nowrap">TUDEM</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Call-To-Action -->
    <section class="relative py-24 px-6 text-center z-10 bg-slate-50 border-t border-slate-200/60">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-display text-3xl font-bold text-slate-900 mb-4">Özel Siparişleriniz İçin</h2>
            <p class="text-slate-600 text-sm md:text-base max-w-xl mx-auto mb-8 font-light">Aradığınız özel tasarım kitapları, koleksiyon kırtasiye ürünlerini veya toplu ofis alımlarını doğrudan bize iletin, size hızlıca temin edelim.</p>
            <a href="{{ route('contact') }}" class="px-8 py-3.5 bg-primary hover:bg-primary-hover text-slate-900 font-bold rounded-full transition-all shadow-md">İletişime Geçin</a>
        </div>
    </section>
@endsection

@section('scripts')
<style>
    .filter-btn.active-filter {
        background-color: #FFCC00;
        color: #0F172A;
        border-color: #FFCC00;
    }
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        display: inline-flex;
        white-space: nowrap;
        animation: marquee 35s linear infinite;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }
    .brand-logo {
        filter: grayscale(100%);
        opacity: 0.6;
        transition: all 0.3s ease;
    }
    .brand-card:hover .brand-logo {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.15);
    }
    .brand-card:hover {
        transform: translateY(-2px);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const searchInput = document.getElementById('productSearch');
        const productItems = document.querySelectorAll('.product-item');

        function filterProducts() {
            const activeFilter = document.querySelector('.filter-btn.active-filter').dataset.filter;
            const searchText = searchInput.value.toLowerCase();

            productItems.forEach(item => {
                const categoryMatch = activeFilter === 'all' || item.dataset.category === activeFilter;
                const searchMatch = item.dataset.name.toLowerCase().includes(searchText) || item.dataset.category.toLowerCase().includes(searchText);

                if (categoryMatch && searchMatch) {
                    item.style.display = 'flex';
                    item.style.opacity = 0;
                    item.style.transform = 'translateY(15px)';
                    setTimeout(() => {
                        item.style.transition = 'all 0.4s ease';
                        item.style.opacity = 1;
                        item.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    item.style.display = 'none';
                }
            });
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active-filter'));
                btn.classList.add('active-filter');
                filterProducts();
            });
        });

        searchInput.addEventListener('input', filterProducts);
    });
</script>
@endsection
