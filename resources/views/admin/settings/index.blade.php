@extends('layouts.admin')

@section('title', 'Site Ayarları | Admin Paneli')
@section('header', 'Site Ayarları')

@section('content')
<div class="mb-10 flex justify-between items-end relative z-10">
    <div class="space-y-1">
        <h1 class="text-4xl font-display font-extrabold text-slate-900 tracking-tight">Site Ayarları</h1>
        <p class="text-slate-500 font-light text-sm max-w-lg leading-relaxed">Sitenizin genel iletişim, sosyal ağ ve temel yapılandırmalarını buradan şekillendirin.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" class="relative z-10">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Sol Kolon: Ana Ayarlar (İletişim & Diğer) -->
        <div class="lg:col-span-8 space-y-8">
            
            <!-- İletişim Kartı -->
            <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl shadow-slate-200/40 border border-white p-8 relative overflow-hidden group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-primary/10 transition-colors duration-500"></div>
                
                <div class="relative z-10 mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <i class="fas fa-address-card text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-900">İletişim Bilgileri</h3>
                        <p class="text-xs text-slate-500 font-medium">Müşterilerinizin size ulaşabileceği kanallar</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest">Telefon Numarası</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" name="phone" value="{{ $settings['phone'] ?? '+90 555 555 55 55' }}" class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-medium" placeholder="+90 555 555 55 55">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest">E-posta Adresi</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" value="{{ $settings['email'] ?? 'info@pozitifkirtasiye.com.tr' }}" class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-medium" placeholder="info@pozitif.com">
                        </div>
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest">Açık Adres</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-slate-400"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea name="address" rows="3" class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-medium resize-none" placeholder="Adres bilgisi giriniz...">{{ $settings['address'] ?? 'Yeni Mahalle, Atatürk Cd. No:1, Merkez/Ankara' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diğer Ayarlar Kartı -->
            <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl shadow-slate-200/40 border border-white p-8 relative overflow-hidden group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-amber-500/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/4 group-hover:bg-amber-500/10 transition-colors duration-500"></div>

                <div class="relative z-10 mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-white flex items-center justify-center shadow-lg shadow-amber-500/30">
                        <i class="fas fa-sliders-h text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-900">Genel Tercihler</h3>
                        <p class="text-xs text-slate-500 font-medium">Footer ve Harita görünümleri</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest">Footer Kısa Yazı</label>
                        <div class="relative">
                            <span class="absolute left-4 top-4 text-slate-400"><i class="fas fa-quote-left"></i></span>
                            <textarea name="footer_text" rows="3" class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-medium resize-none" placeholder="Footer kısmında görünecek kısa açıklama...">{{ $settings['footer_text'] ?? 'Pozitif Kırtasiye ile yaratıcılığınızı keşfedin. Kaliteli ürünler, uygun fiyatlar.' }}</textarea>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest">Google Maps İframe URL</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"><i class="fas fa-map-pin"></i></span>
                            <input type="text" name="maps_url" value="{{ $settings['maps_url'] ?? '' }}" class="w-full pl-11 pr-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all text-sm font-medium" placeholder="https://www.google.com/maps/embed?...">
                        </div>
                        <p class="text-[10px] text-slate-400 mt-1 pl-1">Sadece embed src linkini yapıştırın.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sağ Kolon: Sosyal Medya ve Kaydet -->
        <div class="lg:col-span-4 space-y-8">
            
            <!-- Sosyal Medya Kartı -->
            <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl shadow-slate-200/40 border border-white p-8 relative overflow-hidden group hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
                
                <div class="relative z-10 mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 text-white flex items-center justify-center shadow-lg shadow-pink-500/30">
                        <i class="fas fa-hashtag text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-slate-900">Sosyal Medya</h3>
                        <p class="text-xs text-slate-500 font-medium">Ağ bağlantıları</p>
                    </div>
                </div>

                <div class="space-y-6 relative z-10">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest flex items-center gap-2">
                            <i class="fab fa-instagram text-pink-500"></i> Instagram
                        </label>
                        <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? 'https://instagram.com/pozitifkirtasiye' }}" class="w-full px-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-pink-400 focus:ring-4 focus:ring-pink-400/10 transition-all text-sm font-medium" placeholder="Instagram URL">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest flex items-center gap-2">
                            <i class="fab fa-facebook-f text-blue-500"></i> Facebook
                        </label>
                        <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '#' }}" class="w-full px-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-400/10 transition-all text-sm font-medium" placeholder="Facebook URL">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-600 uppercase tracking-widest flex items-center gap-2">
                            <i class="fab fa-whatsapp text-green-500"></i> WhatsApp
                        </label>
                        <input type="text" name="whatsapp_phone" value="{{ $settings['whatsapp_phone'] ?? '' }}" class="w-full px-4 py-3.5 rounded-xl bg-slate-50/50 border border-slate-200 text-slate-800 focus:outline-none focus:border-green-400 focus:ring-4 focus:ring-green-400/10 transition-all text-sm font-medium" placeholder="örn: 905554443322">
                    </div>
                </div>
            </div>

            <!-- Kaydet Butonu -->
            <div class="bg-slate-900 rounded-[2rem] p-8 shadow-2xl shadow-slate-900/20 text-center relative overflow-hidden group">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,204,0,0.15),transparent_70%)] opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <h4 class="text-white font-display font-bold text-lg mb-2">Değişiklikleri Uygula</h4>
                    <p class="text-slate-400 text-xs mb-6">Yaptığınız değişikliklerin anında yayına alınması için kaydedin.</p>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-primary to-amber-400 hover:from-amber-400 hover:to-primary text-slate-900 font-extrabold py-4 px-6 rounded-xl transition-all duration-300 shadow-[0_0_20px_rgba(255,204,0,0.3)] hover:shadow-[0_0_30px_rgba(255,204,0,0.5)] hover:-translate-y-1 flex items-center justify-center gap-3">
                        <i class="fas fa-cloud-upload-alt text-lg"></i> Ayarları Kaydet
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
