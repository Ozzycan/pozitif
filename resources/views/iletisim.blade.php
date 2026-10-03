@extends('layouts.app')

@section('title', 'İletişim | Pozitif Kitap ve Kırtasiye')

@section('content')
    <!-- Hero Header -->
    <section class="relative min-h-[45vh] flex flex-col justify-center items-center overflow-hidden px-6 pt-32 pb-12">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(221,167,34,0.06),transparent_50%)]"></div>
        <div class="max-w-4xl mx-auto text-center z-10 relative">
            <h1 class="font-display font-extrabold text-4xl md:text-6xl text-slate-900 tracking-tight mb-4">
                İletişim
            </h1>
            <p class="text-slate-600 text-lg font-light max-w-xl mx-auto">
                Sorularınız, önerileriniz veya kurumsal teklif talepleriniz için dilediğiniz an bizimle iletişime geçebilirsiniz.
            </p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="relative py-12 px-6 z-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Info Column (5 cols) -->
                <div class="lg:col-span-5 space-y-8">
                    <h2 class="font-display text-3xl font-bold text-slate-900 mb-8">İletişim Bilgilerimiz</h2>
                    
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-map-marker-alt text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold mb-1">Adres</h4>
                                <p class="text-slate-600 text-sm leading-relaxed">
                                    {{ $siteSettings['address'] ?? 'Saraybosna Cad. Muratpaşa Mah. Bedir Urhan İş Merkezi No:37 Yakutiye / Erzurum' }}
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-phone-alt text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold mb-1">Telefon</h4>
                                <p class="text-slate-600 text-sm">
                                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $siteSettings['phone'] ?? '04422340895') }}" class="hover:text-primary transition-colors">{{ $siteSettings['phone'] ?? '0442 234 08 95' }}</a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex gap-4 items-start">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-envelope text-lg"></i>
                            </div>
                            <div>
                                <h4 class="text-slate-800 font-bold mb-1">E-posta</h4>
                                <p class="text-slate-600 text-sm">
                                    <a href="mailto:{{ $siteSettings['email'] ?? 'info@pozitifkirtasiye.com.tr' }}" class="hover:text-primary transition-colors">{{ $siteSettings['email'] ?? 'info@pozitifkirtasiye.com.tr' }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Work Hours Box -->
                    <div class="p-8 glass-panel rounded-[2rem] border border-slate-200/80 space-y-3">
                        <h4 class="text-slate-800 font-bold font-display uppercase tracking-wider text-xs text-primary">Çalışma Saatlerimiz</h4>
                        <div class="flex justify-between text-xs text-slate-600">
                            <span>Pazartesi - Cumartesi</span>
                            <span class="font-bold">09:00 - 20:00</span>
                        </div>
                        <div class="flex justify-between text-xs text-slate-600">
                            <span>Pazar</span>
                            <span class="font-bold">11:00 - 18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Form Column (7 cols) -->
                <div class="lg:col-span-7">
                    <div class="p-8 md:p-10 glass-panel rounded-[2rem] border border-slate-200 shadow-2xl relative">
                        <h3 class="font-display text-2xl font-bold text-slate-900 mb-8">Bize Mesaj Gönderin</h3>
                        
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Adınız</label>
                                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Adınız" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Soyadınız</label>
                                    <input type="text" name="surname" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="Soyadınız" required>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">E-posta Adresiniz</label>
                                <input type="email" name="email" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm" placeholder="e.g. adiniz@email.com" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Konu</label>
                                <select name="subject" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 focus:outline-none focus:border-primary text-sm">
                                    <option>Genel Sorular</option>
                                    <option>Teklif Talebi</option>
                                    <option>Ürün Bilgisi</option>
                                    <option>Şikayet/Öneri</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-600 uppercase tracking-wide">Mesajınız</label>
                                <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 placeholder-slate-400 focus:outline-none focus:border-primary text-sm resize-none" placeholder="Mesajınızı yazın..." required></textarea>
                            </div>
                            <button type="submit" class="w-full py-3.5 bg-primary hover:bg-primary-hover text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-primary/10">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Maps Container -->
    <div class="w-full h-96 mt-20 relative bg-slate-100 border-t border-slate-200/80 overflow-hidden flex items-center justify-center">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-slate-900/5 z-10 pointer-events-none"></div>
        <iframe src="{{ $siteSettings['maps_url'] ?? 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d191.29213251309366!2d41.2685106!3d39.9039279!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406e5f0be63d5a41%3A0x28d4a11be2eb93f4!2sPozitif%20Kitap%20K%C4%B1rtasiye%20Dijital%20Bask%C4%B1%20Merkezi!5e0!3m2!1str!2str!4v1682691496496!5m2!1str!2str' }}" width="100%" height="100%" style="border:0; filter: grayscale(0.25) contrast(1.1);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
