<!DOCTYPE html>
<html lang="en">
<?php
require_once dirname(__DIR__) . '/include/site.php';
$heading = site_setting('travel_blog_heading');
$intro = site_setting('travel_blog_intro');
$pageTitle = $heading . ' | Liba Travel';
$pageDescription = $intro;
$navCurrent = 'blog';
$posts = published_posts('travel');
include 'include/head.php';
?>
<body class="font-sans text-slate-700 antialiased bg-white">
<?php include 'include/header.php'; ?>
<main id="main-content" class="pt-28 sm:pt-32 pb-20">
  <div class="bg-liba-dark text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-14 sm:py-16">
      <p class="font-mono text-[0.625rem] font-semibold tracking-[0.16em] uppercase text-liba-accent">Liba Travel</p>
      <h1 class="mt-3 font-display text-4xl sm:text-5xl font-extrabold tracking-tight text-white"><?php echo htmlspecialchars($heading); ?></h1>
      <?php if ($intro !== ''): ?>
        <p class="mt-4 max-w-2xl text-lg leading-relaxed text-white/75"><?php echo htmlspecialchars($intro); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <?php if (!$posts): ?>
      <p class="text-slate-500">No travel notes yet.</p>
    <?php else: ?>
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($posts as $post): ?>
          <a href="blog-post.php?slug=<?php echo urlencode($post['slug']); ?>" class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-liba-accent/50 hover:shadow-md">
            <?php if (!empty($post['cover_image'])): ?>
              <img src="../<?php echo htmlspecialchars($post['cover_image']); ?>" alt="" class="h-44 w-full object-cover">
            <?php else: ?>
              <div class="h-2 bg-liba-dark"></div>
            <?php endif; ?>
            <div class="flex flex-1 flex-col p-5">
              <?php if (!empty($post['published_at'])): ?>
                <p class="font-mono text-[0.625rem] font-semibold tracking-[0.16em] uppercase text-slate-400"><?php echo htmlspecialchars(date('M j, Y', strtotime($post['published_at']))); ?></p>
              <?php endif; ?>
              <h2 class="mt-2 text-xl font-bold tracking-tight text-liba-dark group-hover:text-liba-dark"><?php echo htmlspecialchars($post['title']); ?></h2>
              <?php if (!empty($post['excerpt'])): ?>
                <p class="mt-3 text-sm leading-relaxed text-slate-600"><?php echo htmlspecialchars($post['excerpt']); ?></p>
              <?php endif; ?>
              <span class="mt-auto pt-5 text-sm font-semibold text-liba-dark">Read note</span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</main>
<?php include 'include/footer.php'; ?>
</body>
</html>
