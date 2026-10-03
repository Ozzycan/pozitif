<?php include 'includes/header.php'; ?>

<section class="hero">
    <div class="container row-responsive" style="align-items: center; justify-content: space-between;">
        <div class="hero-content">
            <h1 class="animate">Geleceğe <span>Pozitif</span> Bir Adım Atın</h1>
            <p class="animate" style="animation-delay: 0.2s;">Pozitif Kitap ve Kırtasiye olarak, eğitimin ve yaratıcılığın yanındayız. En kaliteli kırtasiye ürünleri ve zengin kitap koleksiyonumuzla hizmetinizdeyiz.</p>
            <div class="hero-btns animate" style="animation-delay: 0.4s; display: flex; gap: 20px;">
                <a href="urunler.php" class="cta-button">Kataloğu İncele</a>
                <a href="hakkimizda.php" style="color: var(--light); border: 2px solid rgba(255,255,255,0.2); padding: 12px 25px; border-radius: 50px; font-weight: 600;">Hakkımızda</a>
            </div>
        </div>
        <div class="hero-image animate" style="animation-delay: 0.6s; flex: 1; position: relative;">
            <img src="assets/hero.png" alt="Pozitif Kitap ve Kırtasiye" style="width: 100%; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1);">
            <div style="position: absolute; bottom: -20px; right: -20px; background: var(--primary); padding: 20px; border-radius: 20px; color: var(--dark); font-weight: 700;">
                <span style="font-size: 2rem;">20+</span><br>Yıllık Tecrübe
            </div>
        </div>
    </div>
</section>

<section style="padding: 100px 0;">
    <div class="container">
        <div class="section-title">
            <span>Hizmet Alanlarımız</span>
            <h2>Neler Sunuyoruz?</h2>
        </div>
        
        <div class="grid">
            <div class="card">
                <i class="fas fa-book"></i>
                <h3>Zengin Kitap Arşivi</h3>
                <p>Edebiyattan eğitime, çocuk kitaplarından akademik yayınlara kadar geniş bir yelpazede binlerce kitap seçeneği.</p>
            </div>
            
            <div class="card">
                <i class="fas fa-pen-fancy"></i>
                <h3>Okul & Ofis Kırtasiye</h3>
                <p>Dünya çapında seçkin markaların en kaliteli okul araç gereçlerini ve ofis ihtiyaçlarınızı karşılıyoruz.</p>
            </div>
            
            <div class="card">
                <i class="fas fa-palette"></i>
                <h3>Sanatsal Malzemeler</h3>
                <p>Sanatseverler için profesyonel boyalar, tuval ve hobi malzemeleriyle yaratıcılığınızı destekliyoruz.</p>
            </div>
        </div>
    </div>
</section>

<section style="background: var(--gray); padding: 100px 0;">
    <div class="container row-responsive" style="align-items: center; gap: 60px;">
        <div style="flex: 1;">
            <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=800" alt="About" style="width: 100%; border-radius: 20px; box-shadow: var(--shadow);">
        </div>
        <div style="flex: 1;">
            <h2 style="font-size: 2.5rem; margin-bottom: 25px;">Pozitif Bakış Açısı</h2>
            <p style="margin-bottom: 20px; font-size: 1.1rem; color: var(--text-muted);">Müşterilerimize sadece ürün değil, bir deneyim sunuyoruz. İhtiyacınız olan her türlü kırtasiye malzemesi ve okumak istediğiniz her kitap için doğru adrestesiniz.</p>
            <p style="margin-bottom: 30px; font-size: 1.1rem; color: var(--text-muted);">Güler yüzlü hizmetimiz ve rekabetçi fiyatlarımızla, Pozitif bir alışveriş deneyimi için bekliyoruz.</p>
            <a href="hakkimizda.php" class="cta-button">Daha Fazla Bilgi</a>
        </div>
    </div>
</section>

<section style="padding: 100px 0; text-align: center; background: var(--primary); color: var(--dark);">
    <div class="container">
        <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Kurumsal Çözümler Arıyorsanız</h2>
        <p style="font-size: 1.2rem; margin-bottom: 40px; opacity: 0.9;">Ofis ihtiyaçlarınız veya toplu kitap siparişleriniz için size özel teklif sunalım.</p>
        <a href="iletisim.php" style="background: var(--dark); color: var(--light); padding: 15px 40px; border-radius: 50px; font-weight: 700; font-size: 1.1rem;">Hemen Teklif Alın</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
