<?php
require_once 'includes/db.php';

$username = 'demo';
$password = 'password123';
$email = 'demo@example.com';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    if (!$pdo) {
        die("<h1>Hata:</h1><p>Veritabanı sistemi başlatılamadı. Lütfen PHP SQLite eklentisinin aktif olduğundan veya MySQL sunucusunun çalıştığından emin olun.</p>");
    }
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashed_password]);
    echo "<h1>Demo Kullanıcı Oluşturuldu!</h1>";
    echo "<p>Artık şu bilgilerle giriş yapabilirsiniz:</p>";
    echo "<ul>";
    echo "<li><strong>Kullanıcı Adı:</strong> $username</li>";
    echo "<li><strong>Şifre:</strong> $password</li>";
    echo "</ul>";
    echo "<p><a href='login.php'>Giriş Sayfasına Git</a></p>";
    
    // Safety: Delete this file after running
    // unlink(__FILE__); 
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "<h1>Hata:</h1><p>Demo kullanıcı zaten mevcut veya bu e-posta adresi kullanılmış.</p>";
    } else {
        echo "<h1>Hata Oluştu:</h1><p>" . $e->getMessage() . "</p>";
    }
}
?>
