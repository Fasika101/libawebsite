<?php
// Setup Admin User Script
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['setup_admin'])) {
    $username = trim($_POST['username'] ?? 'admin');
    $email = trim($_POST['email'] ?? 'admin@libadigitals.com');
    $password = $_POST['password'] ?? 'admin123';
    $full_name = trim($_POST['full_name'] ?? 'Administrator');
    
    if (!$conn) {
        $message = '<div class="alert alert-danger">Database connection failed. Please check your database configuration.</div>';
    } else {
        try {
            // Check if admin user exists
            $checkStmt = $conn->prepare("SELECT id FROM admin_users WHERE username = ? OR email = ?");
            $checkStmt->execute([$username, $email]);
            $existing = $checkStmt->fetch();
            
            if ($existing) {
                // Update existing user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updateStmt = $conn->prepare("UPDATE admin_users SET password = ?, full_name = ?, status = 'active' WHERE id = ?");
                $updateStmt->execute([$hashedPassword, $full_name, $existing['id']]);
                $message = '<div class="alert alert-success">Admin user updated successfully! You can now login.</div>';
                $success = true;
            } else {
                // Create new admin user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insertStmt = $conn->prepare("INSERT INTO admin_users (username, email, password, full_name, status) VALUES (?, ?, ?, ?, 'active')");
                $insertStmt->execute([$username, $email, $hashedPassword, $full_name]);
                $message = '<div class="alert alert-success">Admin user created successfully! You can now login.</div>';
                $success = true;
            }
        } catch(PDOException $e) {
            $message = '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Admin - Liba Digitals</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #8B7AE8 0%, #6B5AE6 50%, #4A3D9E 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .setup-box {
            width: 100%;
            max-width: 500px;
        }
        .setup-card {
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="setup-box">
        <div class="card setup-card">
            <div class="card-body">
                <h3 class="text-center mb-4">
                    <i class="fas fa-user-shield text-primary"></i> Setup Admin User
                </h3>
                
                <?php echo $message; ?>
                
                <?php if (!$success): ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Username *</label>
                        <input type="text" name="username" class="form-control" value="admin" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" value="admin@libadigitals.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password *</label>
                        <input type="password" name="password" class="form-control" value="admin123" required>
                        <small class="text-muted">Default: admin123 (change after setup)</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="Administrator">
                    </div>
                    
                    <button type="submit" name="setup_admin" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i> Create/Update Admin User
                    </button>
                </form>
                <?php else: ?>
                    <div class="text-center">
                        <a href="login.php" class="btn btn-success btn-lg">
                            <i class="fas fa-sign-in-alt"></i> Go to Login
                        </a>
                    </div>
                <?php endif; ?>
                
                <hr>
                <p class="text-center mb-0">
                    <small class="text-muted">
                        <a href="test_db.php">Test Database Connection</a> | 
                        <a href="login.php">Back to Login</a>
                    </small>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
