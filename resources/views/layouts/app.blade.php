<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pozitif Kitap ve Kırtasiye | Geleceğe Pozitif Bakış')</title>
    <meta name="description" content="Pozitif Kitap ve Kırtasiye - En zengin kitap koleksiyonu, kaliteli kırtasiye ve sanatsal malzemeler.">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logopozitif.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            DEFAULT: '#FFCC00',
                            hover: '#E2B600',
                        },
                        dark: {
                            DEFAULT: '#0F172A',
                            accent: '#1E293B',
                            charcoal: '#060814',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom Premium Styles -->
    <style>
        body {
            background-color: #f8fafc;
            color: #1e293b;
            overflow-x: hidden;
        }

        /* Glassmorphism primitives */
        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px 0 rgba(15, 23, 42, 0.04);
        }

        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(255, 204, 0, 0.35);
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.08);
        }

        .glass-card-glow {
            position: relative;
        }

        .glass-card-glow::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(to bottom right, rgba(255, 204, 0, 0.08), rgba(255, 204, 0, 0.01));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .glass-card-glow:hover::before {
            background: linear-gradient(to bottom right, rgba(255, 204, 0, 0.35), rgba(255, 204, 0, 0.08));
        }

        /* Ambient Glow Blobs */
        .glow-sphere {
            position: absolute;
            border-radius: 50%;
            filter: blur(160px);
            opacity: 0.35;
            pointer-events: none;
            z-index: 0;
        }

        /* Modern Text Gradients */
        .text-gradient-gold {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(135deg, #FFB300 0%, #D97706 100%);
        }

        /* Custom scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FFCC00;
        }

        /* Cursor light track effect */
        .cursor-light {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 204, 0, 0.03) 0%, rgba(0, 0, 0, 0) 70%);
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 100;
        }

        /* Upgraded Liquid Glass Navigation */
        .liquid-glass-nav {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0.45) 100%);
            backdrop-filter: blur(28px) saturate(210%);
            -webkit-backdrop-filter: blur(28px) saturate(210%);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow:
                0 15px 35px -10px rgba(15, 23, 42, 0.05),
                inset 0 1px 2px rgba(255, 255, 255, 0.95);
            position: relative;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .liquid-glass-nav::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            padding: 1px;
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.4) 30%, rgba(255, 255, 255, 0.1) 70%, rgba(255, 204, 0, 0.45));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .liquid-glass-nav:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.6) 100%);
            border-color: rgba(255, 204, 0, 0.35);
            box-shadow:
                0 20px 45px -8px rgba(15, 23, 42, 0.08),
                inset 0 1px 3px rgba(255, 255, 255, 0.95),
                0 0 15px 1px rgba(255, 204, 0, 0.05);
        }
    </style>
</head>
<body class="antialiased selection:bg-primary selection:text-slate-900 font-sans text-slate-700">

    <!-- Interactive Cursor Glow Track -->
    <div id="cursorLight" class="cursor-light hidden md:block"></div>

    <!-- Ambient background glows -->
    <div class="glow-sphere w-[80vw] h-[80vw] bg-amber-500/20 top-[-20%] left-[-20%]"></div>
    <div class="glow-sphere w-[70vw] h-[70vw] bg-yellow-500/15 bottom-[-10%] right-[-10%]"></div>
    <div class="glow-sphere w-[50vw] h-[50vw] bg-amber-600/10 top-[40%] left-[25%]"></div>

    <!-- Floating Navigation Bar -->
    <header class="fixed top-6 left-1/2 -translate-x-1/2 w-[90%] max-w-6xl z-50">
        <nav class="liquid-glass-nav rounded-full px-6 py-3.5 flex justify-between items-center transition-all duration-300 shadow-xl">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center px-1 transition-transform duration-300 hover:scale-[1.02]">
                <img src="{{ asset('assets/logopozitif.png') }}" alt="Pozitif Kitap ve Kırtasiye" class="h-10 w-auto">
            </a>

            <!-- Mid-links -->
            <div class="hidden md:flex items-center space-x-8 text-sm font-semibold tracking-wide text-slate-600">
                <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'text-primary' : 'hover:text-primary' }} transition-colors duration-300">Anasayfa</a>
                <a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'text-primary' : 'hover:text-primary' }} transition-colors duration-300">Hakkımızda</a>
                <a href="{{ route('products') }}" class="{{ Route::currentRouteName() == 'products' ? 'text-primary' : 'hover:text-primary' }} transition-colors duration-300">Ürünler</a>
                <a href="{{ route('contact') }}" class="{{ Route::currentRouteName() == 'contact' ? 'text-primary' : 'hover:text-primary' }} transition-colors duration-300">İletişim</a>
                @auth

                @endauth
            </div>

            <!-- CTA & Auth -->
            <div class="flex items-center gap-4">
                @if(!empty($siteSettings['instagram_url']) && $siteSettings['instagram_url'] !== '#')
                    <a href="{{ $siteSettings['instagram_url'] }}" target="_blank" class="hidden sm:flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-tr from-pink-500 to-purple-500 text-white hover:scale-110 transition-all duration-300 shadow-md shadow-pink-500/20">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                @endif

                @auth
                    <div class="hidden sm:flex items-center gap-3 border-r border-slate-200 pr-4 mr-1">
                        <a href="{{ route('profile') }}" class="text-sm font-medium hover:text-primary flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-primary/20 text-primary flex items-center justify-center font-bold">
                                {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                            </span>
                            <span class="hidden lg:inline text-slate-800">{{ Auth::user()->username }}</span>
                        </a>
                    </div>
                    <a href="{{ route('logout') }}" class="text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-red-500 transition-colors">Çıkış</a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider text-slate-900 bg-gradient-to-r from-primary to-amber-300 hover:from-amber-300 hover:to-primary transition-all duration-300 shadow-lg shadow-primary/20 hover:scale-[1.03]">
                        Giriş
                    </a>
                @endauth

                <!-- Mobile Nav Toggle -->
                <button onclick="toggleMobileNav(true)" class="md:hidden w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <!-- Mobile Navigation Overlay -->
    <div id="mobile-nav" class="fixed inset-0 z-50 bg-white/95 backdrop-blur-xl translate-x-full transition-transform duration-500 flex flex-col justify-between p-8 border-l border-slate-200 shadow-2xl">
        <div>
            <div class="flex justify-between items-center mb-16">
                <div class="flex items-center px-1">
                    <img src="{{ asset('assets/logopozitif.png') }}" alt="Pozitif" class="h-10 w-auto">
                </div>
                <button onclick="toggleMobileNav(false)" class="w-10 h-10 rounded-full flex items-center justify-center border border-slate-200 hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col space-y-6 text-2xl font-semibold font-display text-slate-800">
                <a href="{{ route('home') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors">Anasayfa</a>
                <a href="{{ route('about') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors">Hakkımızda</a>
                <a href="{{ route('products') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors">Ürünler</a>
                <a href="{{ route('contact') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors">İletişim</a>
                @auth

                    <a href="{{ route('profile') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors"><i class="fas fa-user text-sm mr-2 text-primary"></i>Profilim</a>
                @else
                    <a href="{{ route('login') }}" onclick="toggleMobileNav(false)" class="hover:text-primary transition-colors">Giriş Yap</a>
                @endauth
            </div>
        </div>
        @auth
            <div class="border-t border-slate-200 pt-8 flex items-center justify-between">
                <span class="text-sm text-slate-600 font-medium">{{ Auth::user()->username }}</span>
                <a href="{{ route('logout') }}" class="text-sm font-bold text-red-400 hover:text-red-500">Çıkış Yap</a>
            </div>
        @endauth
    </div>

    <!-- Main Content Yield -->
    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="relative bg-slate-50 border-t border-slate-200/80 pt-20 pb-8 overflow-hidden z-10">
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary/3 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <!-- Branding -->
                <div class="space-y-4">
                    <div class="flex items-center px-1">
                        <img src="{{ asset('assets/logopozitif.png') }}" alt="Pozitif" class="h-10 w-auto">
                    </div>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $siteSettings['footer_text'] ?? 'Okuyan, yazan ve tasarlayan herkesin yanındayız. En iyi kitaplar ve kırtasiye çözümleri burada.' }}
                    </p>
                </div>

                <!-- Fast Links -->
                <div>
                    <h4 class="text-slate-900 font-display font-bold text-lg mb-6">Hızlı Linkler</h4>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">Anasayfa</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-primary transition-colors">Hakkımızda</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-primary transition-colors">Ürünler</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-primary transition-colors">İletişim</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-slate-900 font-display font-bold text-lg mb-6">İletişim</h4>
                    <ul class="space-y-4 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-primary mt-1"></i>
                            <span>{{ $siteSettings['address'] ?? 'Saraybosna Cad. Muratpaşa Mah. Bedir Urhan İş Merkezi No:37 Yakutiye / Erzurum' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-primary"></i>
                            <span>{{ $siteSettings['phone'] ?? '0442 234 08 95' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-primary"></i>
                            <span>{{ $siteSettings['email'] ?? 'info@pozitifkirtasiye.com.tr' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-slate-200/60 pt-8 text-center text-xs text-slate-500 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-slate-500">&copy; {{ date('Y') }} Pozitif Kitap ve Kırtasiye. Tüm hakları saklıdır.</p>
                <div class="flex gap-4">
                    @if(!empty($siteSettings['facebook_url']) && $siteSettings['facebook_url'] !== '#')
                    <a href="{{ $siteSettings['facebook_url'] }}" target="_blank" class="hover:text-primary transition-colors text-slate-400"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($siteSettings['instagram_url']) && $siteSettings['instagram_url'] !== '#')
                    <a href="{{ $siteSettings['instagram_url'] }}" target="_blank" class="hover:text-primary transition-colors text-slate-400"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if(!empty($siteSettings['whatsapp_phone']))
                    <a href="https://wa.me/{{ $siteSettings['whatsapp_phone'] }}" target="_blank" class="hover:text-primary transition-colors text-slate-400"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Nav Toggle Helper -->
    <script>
        function toggleMobileNav(open) {
            const nav = document.getElementById('mobile-nav');
            if (open) {
                nav.classList.remove('translate-x-full');
            } else {
                nav.classList.add('translate-x-full');
            }
        }

        // Interactive cursor track
        const cursorLight = document.getElementById('cursorLight');
        if (cursorLight) {
            document.addEventListener('mousemove', (e) => {
                cursorLight.style.left = e.clientX + 'px';
                cursorLight.style.top = e.clientY + 'px';
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
