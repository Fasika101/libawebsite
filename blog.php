<!DOCTYPE html>
<html lang="en">
<?php
require_once 'include/site.php';
$blogHeading = site_setting('blog_heading');
$blogIntro = site_setting('blog_intro');
$pageTitle = $blogHeading . ' | Liba Digitals';
$pageDescription = $blogIntro;
include 'include/header.php';
$posts = published_posts();
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
                    <h1><?php echo htmlspecialchars($blogHeading); ?></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="blog.php">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="hero-container">
                <?php if ($blogIntro !== ''): ?>
                    <p class="mb-4"><?php echo htmlspecialchars($blogIntro); ?></p>
                <?php endif; ?>
                <?php if (!$posts): ?>
                    <p>No posts yet.</p>
                <?php else: ?>
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 grid-spacer-4">
                        <?php foreach ($posts as $post): ?>
                            <div class="col">
                                <a href="blog-post.php?slug=<?php echo urlencode($post['slug']); ?>" class="card card-testimonial h-100">
                                    <?php if (!empty($post['cover_image'])): ?>
                                        <img src="<?php echo htmlspecialchars($post['cover_image']); ?>" alt="" class="img-fluid mb-3" style="width:100%;height:180px;object-fit:cover;border-radius:8px;">
                                    <?php endif; ?>
                                    <h3 class="font-1"><?php echo htmlspecialchars($post['title']); ?></h3>
                                    <?php if (!empty($post['published_at'])): ?>
                                        <p class="text-secondary"><?php echo htmlspecialchars(date('M j, Y', strtotime($post['published_at']))); ?></p>
                                    <?php endif; ?>
                                    <p><?php echo htmlspecialchars($post['excerpt'] ?? ''); ?></p>
                                </a>
                            </div>
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
