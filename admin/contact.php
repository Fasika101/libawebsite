<?php
$pageTitle = 'Contact Forms';
require_once 'config.php';
require_once 'includes/header.php';

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$status = $_GET['status'] ?? 'all';
$message = '';

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn) {
    if (isset($_POST['update_status'])) {
        $contactId = $_POST['contact_id'];
        $newStatus = $_POST['status'];
        $notes = $_POST['admin_notes'] ?? '';
        
        try {
            $stmt = $conn->prepare("UPDATE contact_submissions SET status = ?, admin_notes = ? WHERE id = ?");
            $stmt->execute([$newStatus, $notes, $contactId]);
            $message = '<div class="alert alert-success">Status updated successfully!</div>';
        } catch(PDOException $e) {
            $message = '<div class="alert alert-danger">Error updating status.</div>';
        }
    }
}

// Get contact submissions
$contacts = [];
$contact = null;

if ($conn) {
    try {
        $whereClause = $status !== 'all' ? "WHERE status = :status" : "";
        $query = "SELECT * FROM contact_submissions $whereClause ORDER BY created_at DESC";
        $stmt = $conn->prepare($query);
        if ($status !== 'all') {
            $stmt->bindParam(':status', $status);
        }
        $stmt->execute();
        $contacts = $stmt->fetchAll();

        // Get single contact for view
        if (isset($_GET['view'])) {
            $viewId = $_GET['view'];
            $stmt = $conn->prepare("SELECT * FROM contact_submissions WHERE id = ?");
            $stmt->execute([$viewId]);
            $contact = $stmt->fetch();
            
            // Mark as read if new
            if ($contact && $contact['status'] === 'new') {
                $updateStmt = $conn->prepare("UPDATE contact_submissions SET status = 'read' WHERE id = ?");
                $updateStmt->execute([$viewId]);
            }
        }
    } catch(PDOException $e) {
        $message = '<div class="alert alert-danger">Database error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contact Form Submissions</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact Forms</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php echo $message; ?>
        
        <?php if ($contact): ?>
            <!-- View Single Contact -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact Details</h3>
                            <div class="card-tools">
                                <a href="contact.php" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Name:</th>
                                            <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td><a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>"><?php echo htmlspecialchars($contact['email']); ?></a></td>
                                        </tr>
                                        <tr>
                                            <th>Phone:</th>
                                            <td><?php echo htmlspecialchars($contact['phone'] ?? 'N/A'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Subject:</th>
                                            <td><?php echo htmlspecialchars($contact['subject'] ?? 'N/A'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>
                                                <span class="badge badge-<?php 
                                                    echo $contact['status'] == 'new' ? 'warning' : 
                                                        ($contact['status'] == 'read' ? 'info' : 
                                                        ($contact['status'] == 'replied' ? 'success' : 'secondary')); 
                                                ?>">
                                                    <?php echo ucfirst($contact['status']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Submitted:</th>
                                            <td><?php echo date('F d, Y h:i A', strtotime($contact['created_at'])); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Message:</h5>
                                    <div class="border p-3 rounded bg-light">
                                        <?php echo nl2br(htmlspecialchars($contact['message'])); ?>
                                    </div>
                                    
                                    <?php if ($contact['admin_notes']): ?>
                                        <h5 class="mt-3">Admin Notes:</h5>
                                        <div class="border p-3 rounded bg-light">
                                            <?php echo nl2br(htmlspecialchars($contact['admin_notes'])); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <form method="POST" class="mt-3">
                                <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Update Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="new" <?php echo $contact['status'] == 'new' ? 'selected' : ''; ?>>New</option>
                                                <option value="read" <?php echo $contact['status'] == 'read' ? 'selected' : ''; ?>>Read</option>
                                                <option value="replied" <?php echo $contact['status'] == 'replied' ? 'selected' : ''; ?>>Replied</option>
                                                <option value="archived" <?php echo $contact['status'] == 'archived' ? 'selected' : ''; ?>>Archived</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Admin Notes</label>
                                            <textarea name="admin_notes" class="form-control" rows="2" placeholder="Add notes about this contact..."><?php echo htmlspecialchars($contact['admin_notes'] ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="update_status" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Contact List -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Contact Submissions</h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="contact.php?status=all" class="btn btn-sm btn-<?php echo $status == 'all' ? 'primary' : 'secondary'; ?>">All</a>
                                    <a href="contact.php?status=new" class="btn btn-sm btn-<?php echo $status == 'new' ? 'primary' : 'secondary'; ?>">New</a>
                                    <a href="contact.php?status=read" class="btn btn-sm btn-<?php echo $status == 'read' ? 'primary' : 'secondary'; ?>">Read</a>
                                    <a href="contact.php?status=replied" class="btn btn-sm btn-<?php echo $status == 'replied' ? 'primary' : 'secondary'; ?>">Replied</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($contacts)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">No contact submissions found.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($contacts as $contact): ?>
                                            <tr>
                                                <td><?php echo $contact['id']; ?></td>
                                                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                                <td><?php echo htmlspecialchars($contact['phone'] ?? 'N/A'); ?></td>
                                                <td><?php echo htmlspecialchars($contact['subject'] ?? 'N/A'); ?></td>
                                                <td>
                                                    <span class="badge badge-<?php 
                                                        echo $contact['status'] == 'new' ? 'warning' : 
                                                            ($contact['status'] == 'read' ? 'info' : 
                                                            ($contact['status'] == 'replied' ? 'success' : 'secondary')); 
                                                    ?>">
                                                        <?php echo ucfirst($contact['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?php echo date('M d, Y', strtotime($contact['created_at'])); ?></td>
                                                <td>
                                                    <a href="contact.php?view=<?php echo $contact['id']; ?>" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
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
