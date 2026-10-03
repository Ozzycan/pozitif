<?php include 'includes/header.php'; ?>

<section class="hero" style="padding: 60px 0; min-height: auto;">
    <div class="container">
        <div class="hero-content">
            <h1 class="animate">Ürünlerimiz</h1>
            <p class="animate" style="animation-delay: 0.2s;">Geniş ürün yelpazemizle her ihtiyaca yönelik çözümler.</p>
        </div>
    </div>
</section>

<section style="padding: 60px 0;">
    <div class="container">
        <!-- Filter Bar -->
        <div class="filter-container">
            <div class="filter-categories">
                <button class="filter-btn active" data-filter="all">Tümü</button>
                <button class="filter-btn" data-filter="kitap">Kitap</button>
                <button class="filter-btn" data-filter="kirtasiye">Kırtasiye</button>
                <button class="filter-btn" data-filter="ofis">Ofis</button>
                <button class="filter-btn" data-filter="sanatsal">Sanatsal</button>
            </div>
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="productSearch" class="search-input" placeholder="Ürün ara...">
            </div>
        </div>

        <div class="grid" id="productGrid">
            <!-- Category: Stationery -->
            <div class="product-item" data-category="kirtasiye" data-name="Premium Kırtasiye Seti">
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="assets/stationery.png" alt="Stationery" onerror="this.src='https://images.unsplash.com/photo-1542435503-956c469947f6?auto=format&fit=crop&q=80&w=800'">
                        <span class="category-badge">Kırtasiye</span>
                    </div>
                    <div class="product-info">
                        <span class="product-tag">Yeni Sezon</span>
                        <h3>Premium Kırtasiye Seti</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px; line-height: 1.6;">En kaliteli kalemler ve defterler bir arada, şık tasarımıyla masanıza değer katar.</p>
                        <div style="margin-top: auto; padding-top: 20px; font-weight: 700; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                            <span>Sadece Mağazada</span>
                            <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Books -->
            <div class="product-item" data-category="kitap" data-name="Dünya Klasikleri Serisi">
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=800" alt="Books">
                        <span class="category-badge">Kitap</span>
                    </div>
                    <div class="product-info">
                        <span class="product-tag">Çok Satanlar</span>
                        <h3>Dünya Klasikleri Serisi</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px; line-height: 1.6;">Kütüphanenizin olmazsa olmaz parçaları, özel ciltli baskılarıyla sizi bekliyor.</p>
                        <div style="margin-top: auto; padding-top: 20px; font-weight: 700; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                            <span>Sadece Mağazada</span>
                            <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Art -->
            <div class="product-item" data-category="sanatsal" data-name="Sanatsal Boya Setleri">
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&q=80&w=800" alt="Art">
                        <span class="category-badge">Sanatsal</span>
                    </div>
                    <div class="product-info">
                        <span class="product-tag">Profesyonel</span>
                        <h3>Sanatsal Boya Setleri</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px; line-height: 1.6;">Profesyonel sanatçılar için geniş palet, canlı renkler ve üstün pigment kalitesi.</p>
                        <div style="margin-top: auto; padding-top: 20px; font-weight: 700; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                            <span>Sadece Mağazada</span>
                            <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category: Office -->
            <div class="product-item" data-category="ofis" data-name="Ofis Organizasyon Çözümleri">
                <div class="product-card">
                    <div class="product-image-box">
                        <img src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?auto=format&fit=crop&q=80&w=800" alt="Office">
                        <span class="category-badge">Ofis</span>
                    </div>
                    <div class="product-info">
                        <span class="product-tag">Ofis</span>
                        <h3>Ofis Organizasyon Çözümleri</h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 10px; line-height: 1.6;">Verimli bir çalışma alanı için her şey, ergonomik ve şık ofis araç gereçleri.</p>
                        <div style="margin-top: auto; padding-top: 20px; font-weight: 700; color: var(--primary); display: flex; align-items: center; justify-content: space-between;">
                            <span>Sadece Mağazada</span>
                            <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('productSearch');
    const productItems = document.querySelectorAll('.product-item');

    function filterProducts() {
        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
        const searchText = searchInput.value.toLowerCase();

        productItems.forEach(item => {
            const categoryMatch = activeFilter === 'all' || item.dataset.category === activeFilter;
            const searchMatch = item.dataset.name.toLowerCase().includes(searchText);

            if (categoryMatch && searchMatch) {
                item.style.display = 'block';
                item.style.animation = 'fadeIn 0.5s ease forwards';
            } else {
                item.style.display = 'none';
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filterProducts();
        });
    });

    searchInput.addEventListener('input', filterProducts);
});
</script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<section style="background: var(--dark); color: var(--light); padding: 80px 0; text-align: center;">
    <div class="container">
        <h2 style="margin-bottom: 20px;" class="animate">Özel Siparişleriniz İçin</h2>
        <p style="margin-bottom: 40px; opacity: 0.8;" class="animate">Bulamadığınız özel kitaplar veya toplu kırtasiye alımları için bizimle iletişime geçebilirsiniz.</p>
        <a href="iletisim.php" class="cta-button">Hemen Bize Yazın</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/footer.php'; ?>
