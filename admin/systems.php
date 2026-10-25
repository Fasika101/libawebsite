<?php
$pageTitle = 'Systems Content';
require_once 'config.php';
require_once 'includes/header.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn) {
    if (isset($_POST['add_system']) || isset($_POST['edit_system'])) {
        $title = trim($_POST['title'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $content = $_POST['content'] ?? '';
        $icon = trim($_POST['icon'] ?? '');
        $image = trim($_POST['image'] ?? '');
        $order_index = intval($_POST['order_index'] ?? 0);
        $status = $_POST['status'] ?? 'active';
        
        if (empty($slug) && !empty($title)) {
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        }
        
        // Handle image upload
        $imageUploaded = false;
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = dirname(__DIR__) . '/image/systems/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileExtension = strtolower(pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($fileExtension, $allowedExtensions)) {
                $fileName = uniqid() . '_' . time() . '.' . $fileExtension;
                $filePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['image_file']['tmp_name'], $filePath)) {
                    $image = 'image/systems/' . $fileName;
                    $imageUploaded = true;
                }
            }
        }
        
        // If editing and no new image uploaded, keep existing image
        if (isset($_POST['edit_system']) && $id && !$imageUploaded && empty($image)) {
            // Get existing image
            $existingStmt = $conn->prepare("SELECT image FROM systems_content WHERE id = ?");
            $existingStmt->execute([$id]);
            $existing = $existingStmt->fetch();
            if ($existing && !empty($existing['image'])) {
                $image = $existing['image'];
            }
        }
        
        try {
            if (isset($_POST['edit_system']) && $id) {
                // Update existing
                $stmt = $conn->prepare("UPDATE systems_content SET title = ?, slug = ?, description = ?, content = ?, icon = ?, image = ?, order_index = ?, status = ? WHERE id = ?");
                $stmt->execute([$title, $slug, $description, $content, $icon, $image ?: null, $order_index, $status, $id]);
                $message = '<div class="alert alert-success">System updated successfully!</div>';
            } else {
                // Insert new
                $stmt = $conn->prepare("INSERT INTO systems_content (title, slug, description, content, icon, image, order_index, status, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $slug, $description, $content, $icon, $image ?: null, $order_index, $status, getAdminUserId()]);
                $message = '<div class="alert alert-success">System added successfully!</div>';
            }
        } catch(PDOException $e) {
            $message = '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
    
    if (isset($_POST['delete_system']) && $id && $conn) {
        try {
            $stmt = $conn->prepare("DELETE FROM systems_content WHERE id = ?");
            $stmt->execute([$id]);
            $message = '<div class="alert alert-success">System deleted successfully!</div>';
            $action = 'list';
        } catch(PDOException $e) {
            $message = '<div class="alert alert-danger">Error deleting system.</div>';
        }
    }
}

// Get systems
$systems = [];
$system = null;

if ($conn) {
    try {
        $stmt = $conn->query("SELECT * FROM systems_content ORDER BY order_index ASC, id ASC");
        $systems = $stmt->fetchAll();
    } catch(PDOException $e) {
        $message = '<div class="alert alert-danger">Error loading systems: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }

    // Get single system for edit
    if ($action === 'edit' && $id) {
        try {
            $stmt = $conn->prepare("SELECT * FROM systems_content WHERE id = ?");
            $stmt->execute([$id]);
            $system = $stmt->fetch();
            if (!$system) {
                $action = 'list';
                $message = '<div class="alert alert-warning">System not found.</div>';
            }
        } catch(PDOException $e) {
            $action = 'list';
            $message = '<div class="alert alert-danger">Error loading system.</div>';
        }
    }
}
?>

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Systems Content Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Systems</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php echo $message; ?>
        
        <?php if ($action === 'add' || $action === 'edit'): ?>
            <!-- Add/Edit Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $action === 'edit' ? 'Edit' : 'Add'; ?> System</h3>
                            <div class="card-tools">
                                <a href="systems.php" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title *</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($system['title'] ?? ''); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug *</label>
                                            <input type="text" name="slug" class="form-control" value="<?php echo htmlspecialchars($system['slug'] ?? ''); ?>" required>
                                            <small class="text-muted">URL-friendly version (e.g., custom-management-systems)</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($system['description'] ?? ''); ?></textarea>
                                    <small class="text-muted">Short description shown on systems page</small>
                                </div>
                                
                                <div class="form-group">
                                    <label>Content *</label>
                                    <textarea name="content" class="form-control" rows="10" required><?php echo htmlspecialchars($system['content'] ?? ''); ?></textarea>
                                    <small class="text-muted">Full content with HTML support</small>
                                </div>
                                
                                <div class="form-group">
                                    <label>Image</label>
                                    <?php if (!empty($system['image'])): ?>
                                        <div class="mb-2">
                                            <img src="../<?php echo htmlspecialchars($system['image']); ?>" alt="Current Image" style="max-width: 200px; max-height: 150px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
                                            <br><small class="text-muted">Current Image</small>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="image_file" class="form-control" accept="image/*">
                                            <small class="text-muted">Upload new image (JPG, PNG, GIF, WebP)</small>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($system['image'] ?? ''); ?>" placeholder="image/systems/example.jpg">
                                            <small class="text-muted">Or enter image path manually</small>
                                        </div>
                                    </div>
                                    <small class="text-muted d-block mt-1">Leave empty to keep current image when editing</small>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text" name="icon" class="form-control" value="<?php echo htmlspecialchars($system['icon'] ?? ''); ?>" placeholder="fa-gear">
                                            <small class="text-muted">Font Awesome icon class (e.g., fa-gear, fa-boxes)</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Index</label>
                                            <input type="number" name="order_index" class="form-control" value="<?php echo $system['order_index'] ?? 0; ?>">
                                            <small class="text-muted">Lower numbers appear first</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="active" <?php echo ($system['status'] ?? 'active') == 'active' ? 'selected' : ''; ?>>Active</option>
                                                <option value="inactive" <?php echo ($system['status'] ?? '') == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if ($action === 'edit'): ?>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="edit_system" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update System
                                    </button>
                                <?php else: ?>
                                    <button type="submit" name="add_system" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add System
                                    </button>
                                <?php endif; ?>
                                <a href="systems.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Systems List -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Systems</h3>
                            <div class="card-tools">
                                <a href="systems.php?action=add" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i> Add New System
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Icon</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($systems)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No systems found. <a href="systems.php?action=add">Add one now</a></td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($systems as $sys): ?>
                                            <tr>
                                                <td><?php echo $sys['id']; ?></td>
                                                <td>
                                                    <?php if (!empty($sys['image'])): ?>
                                                        <img src="../<?php echo htmlspecialchars($sys['image']); ?>" alt="<?php echo htmlspecialchars($sys['title']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                    <?php else: ?>
                                                        <span class="text-muted">No image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($sys['title']); ?></td>
                                                <td><code><?php echo htmlspecialchars($sys['slug']); ?></code></td>
                                                <td>
                                                    <?php if ($sys['icon']): ?>
                                                        <i class="fas <?php echo htmlspecialchars($sys['icon']); ?>"></i>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $sys['order_index']; ?></td>
                                                <td>
                                                    <span class="badge badge-<?php echo $sys['status'] == 'active' ? 'success' : 'secondary'; ?>">
                                                        <?php echo ucfirst($sys['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('M d, Y', strtotime($sys['updated_at'])); ?></td>
                                                <td>
                                                    <a href="systems.php?action=edit&id=<?php echo $sys['id']; ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this system?');">
                                                        <input type="hidden" name="id" value="<?php echo $sys['id']; ?>">
                                                        <button type="submit" name="delete_system" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
