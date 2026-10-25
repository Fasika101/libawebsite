<?php
require_once 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($password)) {
        if (!$conn) {
            $error = 'Database connection failed. Please ensure the database is set up and check config.php settings.';
        } else {
            try {
                $stmt = $conn->prepare("SELECT id, username, password, full_name, status FROM admin_users WHERE username = ? OR email = ?");
                $stmt->execute([$username, $username]);
                $user = $stmt->fetch();
            
                if ($user) {
                    // Check password
                    if (password_verify($password, $user['password'])) {
                    if ($user['status'] === 'active') {
                        $_SESSION[ADMIN_SESSION_KEY] = true;
                        $_SESSION[ADMIN_USER_ID] = $user['id'];
                        $_SESSION['admin_username'] = $user['username'];
                        $_SESSION['admin_name'] = $user['full_name'] ?? $user['username'];
                        
                        // Update last login
                        $updateStmt = $conn->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = ?");
                        $updateStmt->execute([$user['id']]);
                        
                        header('Location: dashboard.php');
                        exit;
                    } else {
                        $error = 'Your account is inactive. Please contact administrator.';
                    }
                    } else {
                        $error = 'Invalid password. Please try again or use setup_admin.php to reset.';
                    }
                } else {
                    $error = 'User not found. Please check your username or use setup_admin.php to create an admin account.';
                }
            } catch(PDOException $e) {
                $error = 'Login failed: ' . htmlspecialchars($e->getMessage());
            }
        }
    } else {
        $error = 'Please fill in all fields.';
    }
}

// Redirect if already logged in
if (isAdminLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Liba Digitals</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #8B7AE8 0%, #6B5AE6 50%, #4A3D9E 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 400px;
        }
        .login-card {
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .login-logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: #8B7AE8;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card login-card">
            <div class="card-body login-card-body">
                <div class="login-logo text-center mb-4">
                    <i class="fas fa-shield-alt"></i> Liba Admin
                </div>
                <p class="login-box-msg">Sign in to start your session</p>
                
                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fas fa-ban"></i> <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username or Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                            </button>
                        </div>
                    </div>
                </form>
                
                <p class="mt-3 mb-1 text-center">
                    <small class="text-muted">
                        <a href="setup_admin.php">Setup Admin Account</a> | 
                        <a href="test_db.php">Test Database</a>
                    </small>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
