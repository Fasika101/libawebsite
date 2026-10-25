<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'libaweb_db');

// Create database connection
$conn = null;
try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Set connection to null on error - pages can check if $conn exists
    $conn = null;
    // Log error but don't die - allows login page to load
    error_log("Database connection failed: " . $e->getMessage());
}

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Admin Configuration
define('ADMIN_SESSION_KEY', 'admin_logged_in');
define('ADMIN_USER_ID', 'admin_user_id');

// Helper function to check if admin is logged in
function isAdminLoggedIn() {
    return isset($_SESSION[ADMIN_SESSION_KEY]) && $_SESSION[ADMIN_SESSION_KEY] === true;
}

// Helper function to require login
function requireAdminLogin() {
    if (!isAdminLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

// Helper function to get admin user ID
function getAdminUserId() {
    return isset($_SESSION[ADMIN_USER_ID]) ? $_SESSION[ADMIN_USER_ID] : null;
}
?>
