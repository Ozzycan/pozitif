<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-info">
                <div class="footer-logo">
                    <div style="font-size: 1.5rem; font-weight: 800; color: var(--primary); margin-bottom: 10px;">POZİTİF</div>
                </div>
                <p style="opacity: 0.7; margin-bottom: 20px;">Kitap, kırtasiye ve ofis gereçlerinde kaliteli hizmetin adresi. Geleceği birlikte yazıyoruz.</p>
                <div class="social-links" style="display: flex; gap: 15px;">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h4>Hızlı Bağlantılar</h4>
                <ul>
                    <li><a href="index.php">Anasayfa</a></li>
                    <li><a href="hakkimizda.php">Hakkımızda</a></li>
                    <li><a href="urunler.php">Ürünlerimiz</a></li>
                    <li><a href="iletisim.php">İletişim</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h4>Ürün Kategorileri</h4>
                <ul>
                    <li><a href="#">Okul Kırtasiye</a></li>
                    <li><a href="#">Ofis Malzemeleri</a></li>
                    <li><a href="#">Roman & Kitap</a></li>
                    <li><a href="#">Sanatsal Ürünler</a></li>
                </ul>
            </div>
            
            <div class="footer-links" id="contact-info">
                <h4>İletişim</h4>
                <ul class="contact-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Saraybosna Cad. Muratpaşa Mah. Bedir Urhan İş Merkezi No:37 Yakutiye / Erzurum</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <span>0442 234 08 95</span>
                    </li>
                    <li>
                        <i class="fas fa-mobile-alt"></i>
                        <span>0534 520 40 54</span>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span>info@pozitifkirtasiye.com.tr</span>
                    </li>
                </ul>
            </div>

        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Pozitif Kitap ve Kırtasiye. Tüm Hakları Saklıdır.</p>
        </div>
    </div>
</footer>

<script>
    // Simple intersection observer for fade-in animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.card, .hero-content, .section-title').forEach(el => {
        observer.observe(el);
    });
</script>

</body>
</html>
