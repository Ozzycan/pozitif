<?php
/**
 * Database Configuration and Connection
 */

$host = 'localhost';
$dbname = 'pozitif_db';
$username = 'root';
$password = ''; // Default XAMPP password is empty

$pdo = null;
$db_type = 'none';
$pdo_error = null;

/**
 * Initialize the database schema if it doesn't exist.
 * This works for both MySQL and SQLite.
 */
if (!function_exists('db_initialize')) {
    function db_initialize($pdo) {
        $driver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
        
        // Use simpler generic types that work for both if possible
        // but id type must be different for auto-increment
        $ai_type = ($driver === 'sqlite') ? 'INTEGER PRIMARY KEY AUTOINCREMENT' : 'INT AUTO_INCREMENT PRIMARY KEY';
        $json_type = ($driver === 'sqlite') ? 'TEXT' : 'JSON';
        
        try {
            // Create users table
            $pdo->exec("CREATE TABLE IF NOT EXISTS users (
                id $ai_type,
                username VARCHAR(50) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                email VARCHAR(100) NOT NULL UNIQUE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            // Create designs table
            $pdo->exec("CREATE TABLE IF NOT EXISTS designs (
                id $ai_type,
                user_id INT,
                file_path VARCHAR(255) NOT NULL,
                design_data $json_type,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id)
            )");
            return true;
        } catch(PDOException $e) {
            error_log("Database initialization failed: " . $e->getMessage());
            return false;
        }
    }
}

// Ensure session exists
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Attempt MySQL connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 2
    ]);
    $db_type = 'mysql';
    db_initialize($pdo); // Ensure tables exist
} catch(PDOException $e) {
    // 2. MySQL failed, attempt SQLite fallback for development
    try {
        $sqlite_path = __DIR__ . '/pozitif_db.sqlite';
        $pdo = new PDO("sqlite:$sqlite_path");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db_type = 'sqlite';
        
        // Initialize SQLite schema
        db_initialize($pdo);
    } catch(PDOException $sqlite_e) {
        // Both failed
        $pdo_error = "MySQL: " . $e->getMessage() . " | SQLite: " . $sqlite_e->getMessage();
        error_log("Connection failed: " . $pdo_error);
    }
}
?>
