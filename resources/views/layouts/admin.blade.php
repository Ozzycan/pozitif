<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Paneli | Pozitif')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/logopozitif.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
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
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col hidden md:flex">
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-display font-bold text-white tracking-wider flex items-center gap-2">
                <i class="fas fa-bolt text-primary"></i> Pozitif Admin
            </a>
        </div>
        <nav class="flex-1 py-4 px-3 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-primary text-slate-900' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors">
                <i class="fas fa-home w-5 text-center mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-slate-900' : 'text-slate-400 group-hover:text-white' }}"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'bg-primary text-slate-900' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors mt-2">
                <i class="fas fa-tags w-5 text-center mr-3 {{ request()->routeIs('admin.categories.*') ? 'text-slate-900' : 'text-slate-400 group-hover:text-white' }}"></i>
                Kategoriler
            </a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'bg-primary text-slate-900' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors mt-2">
                <i class="fas fa-users w-5 text-center mr-3 {{ request()->routeIs('admin.users.*') ? 'text-slate-900' : 'text-slate-400 group-hover:text-white' }}"></i>
                Kullanıcılar
            </a>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'bg-primary text-slate-900' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors mt-2">
                <i class="fas fa-cog w-5 text-center mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-slate-900' : 'text-slate-400 group-hover:text-white' }}"></i>
                Site Ayarları
            </a>
            <a href="{{ route('home') }}" class="text-slate-300 hover:bg-slate-800 hover:text-white group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors mt-8 border-t border-slate-800 pt-4" target="_blank">
                <i class="fas fa-external-link-alt w-5 text-center mr-3 text-slate-400 group-hover:text-white"></i>
                Siteye Git
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('logout') }}" class="flex items-center px-3 py-2 text-sm font-medium text-slate-300 hover:text-red-400 hover:bg-slate-800 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt w-5 text-center mr-3"></i>
                Çıkış Yap
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 z-10">
            <div class="flex items-center md:hidden">
                <button class="text-slate-500 hover:text-slate-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <span class="ml-4 font-bold text-lg font-display">Admin Paneli</span>
            </div>
            <div class="hidden md:flex items-center">
                <h2 class="text-xl font-semibold text-slate-800">@yield('header')</h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-primary/20 text-primary flex items-center justify-center font-bold">
                        A
                    </div>
                    <span class="text-sm font-medium hidden sm:block">{{ auth()->user()->username ?? 'Admin' }}</span>
                </div>
            </div>
        </header>

        <!-- Main Area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
