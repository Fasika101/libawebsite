<!DOCTYPE html>
<html lang="en">
<?php
require_once dirname(__DIR__) . '/include/site.php';
$slug = trim($_GET['slug'] ?? '');
$post = find_published_post($slug, 'travel');
if (!$post) {
    http_response_code(404);
}
$pageTitle = $post ? ($post['title'] . ' | Liba Travel') : 'Note not found | Liba Travel';
$pageDescription = ($post && !empty($post['excerpt'])) ? $post['excerpt'] : 'Travel note from Liba Travel.';
$navCurrent = 'blog';
include 'include/head.php';
?>
<body class="font-sans text-slate-700 antialiased bg-white">
<?php include 'include/header.php'; ?>
<main id="main-content" class="pt-28 sm:pt-32 pb-20">
  <article class="max-w-3xl mx-auto px-4 sm:px-6">
    <p class="font-mono text-[0.625rem] font-semibold tracking-[0.16em] uppercase text-slate-400">
      <a href="blog.php" class="text-liba-dark hover:text-liba-accent">Travel notes</a>
    </p>
    <h1 class="mt-3 font-display text-3xl sm:text-5xl font-extrabold tracking-tight text-liba-dark"><?php echo htmlspecialchars($post['title'] ?? 'Note not found'); ?></h1>
    <?php if (!$post): ?>
      <p class="mt-6 text-slate-600">This note is not available.</p>
      <a href="blog.php" class="mt-6 inline-flex rounded-2xl bg-liba-accent px-5 py-3 font-bold text-liba-darker hover:bg-liba-accent-hover">Back to travel notes</a>
    <?php else: ?>
      <?php if (!empty($post['published_at'])): ?>
        <p class="mt-4 font-mono text-xs uppercase tracking-[0.14em] text-slate-400"><?php echo htmlspecialchars(date('F j, Y', strtotime($post['published_at']))); ?></p>
      <?php endif; ?>
      <?php if (!empty($post['cover_image'])): ?>
        <img src="../<?php echo htmlspecialchars($post['cover_image']); ?>" alt="" class="mt-8 w-full rounded-2xl object-cover">
      <?php endif; ?>
      <div class="mt-8 space-y-5 text-lg leading-relaxed text-slate-700">
        <?php foreach (preg_split("/\r\n|\n|\r/", $post['body']) as $paragraph): ?>
          <?php if (trim($paragraph) !== ''): ?>
            <p><?php echo htmlspecialchars($paragraph); ?></p>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </article>
</main>
<?php include 'include/footer.php'; ?>
</body>
</html>
