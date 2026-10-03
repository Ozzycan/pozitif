<?php 
require_once 'includes/db.php'; 

if (isset($_SESSION['user_id'])) {
    header('Location: tasarim.php');
    exit;
}

$error = '';
include 'includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$pdo) {
        $error = "Veritabanı bağlantısı kurulamadı. Lütfen veritabanının çalıştığından emin olun.";
    } else {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: tasarim.php');
            exit;
        } else {
            $error = "Hatalı kullanıcı adı veya şifre.";
        }
    }
}

include 'includes/header.php'; 
?>

<section style="padding: 100px 0; background: var(--gray); min-height: 80vh; display: flex; align-items: center;">
    <div class="container" style="max-width: 500px;">
        <div class="card" style="padding: 40px; border-top: 5px solid var(--primary);">
            <h2 style="margin-bottom: 30px; text-align: center;">Giriş Yap</h2>
            
            <?php if ($error): ?>
                <div style="background: #fee; color: #c00; padding: 15px; border-radius: 10px; margin-bottom: 20px; font-size: 0.9rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Kullanıcı Adı veya E-posta</label>
                    <input type="text" name="username" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <div style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Şifre</label>
                    <input type="password" name="password" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ddd; outline: none;">
                </div>
                <button type="submit" class="cta-button" style="width: 100%; border: none; cursor: pointer;">Giriş Yap</button>
            </form>
            
            <p style="margin-top: 25px; text-align: center; font-size: 0.9rem; color: var(--text-muted);">
                Hesabınız yok mu? <a href="register.php" style="color: var(--dark); font-weight: 700;">Hemen Kayıt Olun</a>
            </p>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
