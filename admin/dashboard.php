<?php
$pageTitle = 'Dashboard';
require_once 'config.php';
require_once 'includes/header.php';

// Get statistics
$totalContacts = $newContacts = $totalSystems = 0;
$recentContacts = [];

if ($conn) {
    try {
        $totalContacts = $conn->query("SELECT COUNT(*) as count FROM contact_submissions")->fetch()['count'];
        $newContacts = $conn->query("SELECT COUNT(*) as count FROM contact_submissions WHERE status = 'new'")->fetch()['count'];
        $totalSystems = $conn->query("SELECT COUNT(*) as count FROM systems_content WHERE status = 'active'")->fetch()['count'];
        $recentContacts = $conn->query("SELECT * FROM contact_submissions ORDER BY created_at DESC LIMIT 5")->fetchAll();
    } catch(PDOException $e) {
        // Keep default values
    }
}
?>

<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $totalContacts; ?></h3>
                        <p>Total Contact Forms</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="contact.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $newContacts; ?></h3>
                        <p>New Messages</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <a href="contact.php?status=new" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $totalSystems; ?></h3>
                        <p>Active Systems</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <a href="systems.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo date('Y'); ?></h3>
                        <p>Current Year</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <i class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Contact Forms -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-envelope mr-2"></i>Recent Contact Submissions</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($recentContacts)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No contact submissions yet.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($recentContacts as $contact): ?>
                                        <tr>
                                            <td><?php echo $contact['id']; ?></td>
                                            <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                            <td><?php echo htmlspecialchars($contact['email']); ?></td>
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
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
