<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pozitif Kitap ve Kırtasiye | Geleceğe Pozitif Bakış</title>
    <meta name="description" content="Pozitif Kitap ve Kırtasiye - Aradığınız tüm kitap, kırtasiye ve ofis malzemeleri kaliteli hizmet anlayışıyla burada.">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="container">
        <nav>
            <a href="index.php" class="logo">
                <div class="logo-text">
                    <i class="fas fa-book-open"></i>
                    <div class="text-group">
                        <span class="brand-name">POZİTİF</span>
                        <span class="brand-subtitle">KİTAP VE KIRTASİYE</span>
                    </div>
                </div>
            </a>
            
            <div class="nav-menu" id="navMenu">
                <div class="nav-links">
                    <a href="index.php" class="active">Anasayfa</a>
                    <a href="hakkimizda.php">Hakkımızda</a>
                    <a href="urunler.php">Ürünler</a>

                    <a href="iletisim.php">İletişim</a>
                </div>
                
                <div style="display: flex; gap: 15px; align-items: center;">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="profil.php" style="font-weight: 600; color: var(--secondary); text-decoration: none;"><i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?></a>
                        <a href="logout.php" style="color: #c00; font-weight: 600;">Çıkış</a>
                    <?php else: ?>
                        <a href="login.php" style="font-weight: 600;">Giriş Yap</a>
                        <a href="iletisim.php" class="cta-button">Teklif Al</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </div>
</header>

<?php if ($pdo_error): ?>
<div style="background: #fff5f5; border-bottom: 2px solid #feb2b2; padding: 15px 0; color: #c53030; text-align: center; position: sticky; top: 70px; z-index: 999;">
    <div class="container" style="display: flex; align-items: center; justify-content: center; gap: 15px;">
        <i class="fas fa-exclamation-triangle"></i>
        <span><strong>Kritik Hata:</strong> Veritabanı sistemi başlatılamadı. Lütfen PHP SQLite eklentisinin aktif olduğundan emin olun.</span>
        <button onclick="location.reload()" style="background: #c53030; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer; font-size: 0.8rem; font-weight: 600;">Tekrar Dene</button>
    </div>
</div>
<?php endif; ?>

<script>
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileToggle.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
    }
</script>
