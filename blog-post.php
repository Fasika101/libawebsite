<!DOCTYPE html>
<html lang="en">
<?php
require_once 'include/site.php';
$slug = trim($_GET['slug'] ?? '');
$post = find_published_post($slug);
if (!$post) {
    http_response_code(404);
}
$pageTitle = $post ? ($post['title'] . ' | Liba Digitals') : 'Post not found | Liba Digitals';
$pageDescription = ($post && !empty($post['excerpt'])) ? $post['excerpt'] : 'Blog post from Liba Digitals.';
include 'include/header.php';
?>
<body>
    <header>
        <?php include 'include/navbar.php'; ?>
    </header>
    <aside>
        <?php include 'include/sidebar.php'; ?>
    </aside>
    <main id="main-content">
        <div class="section-banner-inner inner-background">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-3">
                    <h1><?php echo htmlspecialchars($post['title'] ?? 'Post not found'); ?></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="blog.php">Blog</a>
                        <?php if ($post): ?>
                            <i class="fa-solid fa-chevron-right"></i>
                            <a href="blog-post.php?slug=<?php echo urlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="hero-container" style="max-width: 760px;">
                <?php if (!$post): ?>
                    <p>This post is not available.</p>
                    <a href="blog.php" class="btn btn-accent">Back to the blog</a>
                <?php else: ?>
                    <?php if (!empty($post['cover_image'])): ?>
                        <img src="<?php echo htmlspecialchars($post['cover_image']); ?>" alt="" class="img-fluid mb-4" style="width:100%;border-radius:12px;">
                    <?php endif; ?>
                    <?php if (!empty($post['published_at'])): ?>
                        <p class="mb-4"><?php echo htmlspecialchars(date('F j, Y', strtotime($post['published_at']))); ?></p>
                    <?php endif; ?>
                    <div class="d-flex flex-column gspace-3">
                        <?php foreach (preg_split("/\r\n|\n|\r/", $post['body']) as $paragraph): ?>
                            <?php if (trim($paragraph) !== ''): ?>
                                <p><?php echo htmlspecialchars($paragraph); ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <footer>
        <?php include 'include/footer.php'; ?>
    </footer>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
