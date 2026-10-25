<?php
// Test database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

echo "<h2>Database Connection Test</h2>";

if ($conn) {
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Test tables
    try {
        $tables = ['admin_users', 'contact_submissions', 'systems_content'];
        foreach ($tables as $table) {
            $stmt = $conn->query("SELECT COUNT(*) as count FROM $table");
            $count = $stmt->fetch()['count'];
            echo "<p>✓ Table '$table' exists with $count records</p>";
        }
    } catch(PDOException $e) {
        echo "<p style='color: red;'>✗ Error checking tables: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Database connection failed!</p>";
    echo "<p>Please check:</p>";
    echo "<ul>";
    echo "<li>Database name: " . DB_NAME . "</li>";
    echo "<li>Database host: " . DB_HOST . "</li>";
    echo "<li>Database user: " . DB_USER . "</li>";
    echo "<li>Make sure the database exists and the SQL file has been imported</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><a href='login.php'>Go to Login</a></p>";
?>
