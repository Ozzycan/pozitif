<?php
require_once 'includes/db.php';

if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['success' => false, 'message' => 'Unauthorized access']));
}

if (!$pdo) {
    die(json_encode(['success' => false, 'message' => 'Veritabanı bağlantısı kurulamadı.']));
}

$imageData = $_POST['image'];

if (empty($imageData)) {
    die(json_encode(['success' => false, 'message' => 'No image data received']));
}

// Create uploads directory if it doesn't exist
$uploadDir = 'assets/uploads/designs/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Process the base64 data
$imageData = str_replace('data:image/png;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$data = base64_decode($imageData);

// Generate unique filename
$fileName = 'design_' . $_SESSION['user_id'] . '_' . time() . '.png';
$filePath = $uploadDir . $fileName;

// Save to file system
if (file_put_contents($filePath, $data)) {
    // Save to database
    try {
    $stmt = $pdo->prepare("INSERT INTO designs (user_id, file_path) VALUES (?, ?)");
        $stmt->execute([$_SESSION['user_id'], $filePath]);
        
        echo json_encode(['success' => true, 'message' => 'Design saved successfully']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save image file']);
}
?>
