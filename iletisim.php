<?php include 'includes/header.php'; ?>

<section class="hero" style="padding: 60px 0; min-height: auto;">
    <div class="container">
        <div class="hero-content">
            <h1 class="animate">İletişim</h1>
            <p class="animate" style="animation-delay: 0.2s;">Sorularınız, önerileriniz veya teklif talepleriniz için bize ulaşın.</p>
        </div>
    </div>
</section>

<section style="padding: 100px 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 60px;">
            <div>
                <h2 style="margin-bottom: 30px;">İletişim Bilgilerimiz</h2>
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 25px;">
                        <div style="background: var(--primary); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="color: var(--dark); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Adres</h4>
                            <p style="color: var(--text-muted);">Saraybosna Cad. Muratpaşa Mah. Bedir Urhan İş Merkezi No:37 Yakutiye / Erzurum</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 25px;">
                        <div style="background: var(--primary); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-phone" style="color: var(--dark); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px;">Telefon</h4>
                            <p style="margin-bottom: 5px;"><a href="tel:04422340895" style="color: var(--text-muted); text-decoration: none;">0442 234 08 95</a></p>
                            <p><a href="tel:05345204054" style="color: var(--text-muted); text-decoration: none;">0534 520 40 54</a></p>
                        </div>
                    </div>


                    <div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 25px;">
                        <div style="background: var(--primary); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="color: var(--dark); font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 5px;">E-posta</h4>
                            <p style="color: var(--text-muted);">info@pozitifkirtasiye.com.tr</p>
                        </div>
                    </div>
                </div>

                <div class="card" style="padding: 30px; background: var(--gray); border: none;">
                    <h4 style="margin-bottom: 15px;">Çalışma Saatlerimiz</h4>
                    <p style="font-size: 0.9rem; margin-bottom: 5px;">Pazartesi - Cumartesi: 09:00 - 20:00</p>
                    <p style="font-size: 0.9rem;">Pazar: 11:00 - 18:00</p>
                </div>
            </div>

            <div class="card">
                <h3 style="margin-bottom: 30px;">Mesaj Gönderin</h3>
                <form action="#" method="POST" style="display: grid; gap: 20px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <label style="font-weight: 600; font-size: 0.9rem;">Adınız</label>
                            <input type="text" placeholder="Adınız" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <label style="font-weight: 600; font-size: 0.9rem;">Soyadınız</label>
                            <input type="text" placeholder="Soyadınız" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; font-size: 0.9rem;">E-posta Adresiniz</label>
                        <input type="email" placeholder="E-posta" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; font-size: 0.9rem;">Konu</label>
                        <select style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; outline: none;">
                            <option>Genel Sorular</option>
                            <option>Teklif Talebi</option>
                            <option>Ürün Bilgisi</option>
                            <option>Şikayet/Öneri</option>
                        </select>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; font-size: 0.9rem;">Mesajınız</label>
                        <textarea placeholder="Mesajınız..." rows="5" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; outline: none; resize: vertical;"></textarea>
                    </div>
                    <button type="submit" class="cta-button" style="border: none; cursor: pointer; text-align: center;">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Simple Google Maps Placeholder -->
<div style="width: 100%; height: 450px; background: #eee; position: relative;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <i class="fas fa-map-marked-alt" style="font-size: 3rem; color: #ccc; margin-bottom: 20px;"></i>
        <p style="color: #999;">Buraya Google Haritalar iframe eklenecektir.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
