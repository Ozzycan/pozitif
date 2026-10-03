include 'includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $pdo) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

        if ($password !== $password_confirm) {
            $error = "Şifreler eşleşmiyor.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            try {
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username, $email, $hashed_password]);
                $success = "Kayıt başarılı! Şimdi giriş yapabilirsiniz.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $error = "Bu kullanıcı adı veya e-posta zaten kullanımda.";
                } else {
                    $error = "Bir hata oluştu: " . $e->getMessage();
                }
            }
        }
    }
}

include 'includes/header.php'; 
?>

<section style="padding: 100px 0; background: var(--gray); min-height: 80vh; display: flex; align-items: center;">
    <div class="container" style="max-width: 500px;">
        <div class="card" style="padding: 40px; border-top: 5px solid var(--primary);">
            <h2 style="margin-bottom: 30px; text-align: center;">Kayıt Ol</h2>
            
            <?php if ($error): ?>
                <div style="background: #fee; color: #c00; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div style="background: #efe; color: #080; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;">
                    <?php echo $success; ?>
                    <br><a href="login.php" style="font-weight: 700;">Giriş Yap</a>
                </div>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Kullanıcı Adı</label>
                    <input type="text" name="username" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">E-posta</label>
                    <input type="email" name="email" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Şifre</label>
                    <input type="password" name="password" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <div style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Şifre Tekrar</label>
                    <input type="password" name="password_confirm" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <button type="submit" class="cta-button" style="width: 100%; border: none; cursor: pointer;">Kayıt Ol</button>
            </form>
            
            <p style="margin-top: 25px; text-align: center; font-size: 0.9rem; color: var(--text-muted);">
                Zaten üye misiniz? <a href="login.php" style="color: var(--dark); font-weight: 700;">Giriş Yap</a>
            </p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
