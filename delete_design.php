<?php
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['success' => false, 'message' => 'Unauthorized access']));
}

if (!$pdo) {
    die(json_encode(['success' => false, 'message' => 'Veritabanı bağlantısı kurulamadı.']));
}

$design_id = $_POST['id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$design_id) {
    die(json_encode(['success' => false, 'message' => 'Geçersiz tasarım ID.']));
}

try {
    // Check if the design belongs to the user
    $stmt = $pdo->prepare("SELECT file_path FROM designs WHERE id = ? AND user_id = ?");
    $stmt->execute([$design_id, $user_id]);
    $design = $stmt->fetch();

    if ($design) {
        // Delete file from disk
        if (file_exists($design['file_path'])) {
            unlink($design['file_path']);
        }

        // Delete from database
        $stmt = $pdo->prepare("DELETE FROM designs WHERE id = ?");
        $stmt->execute([$design_id]);

        echo json_encode(['success' => true, 'message' => 'Tasarım silindi.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Tasarım bulunamadı veya silme yetkiniz yok.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Veritabanı hatası: ' . $e->getMessage()]);
}
?>
