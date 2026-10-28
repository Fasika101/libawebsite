<?php
require_once dirname(__DIR__, 2) . '/include/site.php';
$navCurrent = $navCurrent ?? '';
?>
<header id="site-header" class="fixed top-0 inset-x-0 z-50" role="banner">
  <div class="bg-liba-dark/95 backdrop-blur-md border-b border-white/10 shadow-lg">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16 sm:h-[4.25rem]">
      <a href="index.php" class="flex items-center gap-3 shrink-0" aria-label="Liba Travel home">
        <img src="<?php echo htmlspecialchars(site_setting('travel_logo')); ?>" alt="Liba Travel" class="h-9 sm:h-10 w-auto" />
        <span class="hidden sm:block text-white/80 text-sm font-semibold tracking-[0.2em] lowercase border-l border-white/20 pl-3">travel</span>
      </a>
      <nav class="hidden md:flex items-center gap-8 text-sm font-semibold tracking-wide text-white/85" aria-label="Primary">
        <a href="index.php#services" class="hover:text-liba-accent transition-colors">Services</a>
        <a href="index.php#about" class="hover:text-liba-accent transition-colors">About</a>
        <a href="blog.php" class="hover:text-liba-accent transition-colors <?php echo $navCurrent === 'blog' ? 'text-liba-accent' : ''; ?>" <?php echo $navCurrent === 'blog' ? 'aria-current="page"' : ''; ?>>Blog</a>
        <a href="index.php#contact" class="hover:text-liba-accent transition-colors">Contact</a>
        <a href="tel:+251942816768" class="inline-flex items-center gap-2 rounded-full bg-liba-accent text-liba-darker px-4 py-2 font-semibold hover:bg-liba-accent-hover transition-colors">Call us</a>
      </nav>
      <button type="button" id="menu-toggle" class="md:hidden p-2 -mr-2 text-white rounded-lg hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-liba-accent" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
        <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="md:hidden hidden fixed inset-0 top-16 bg-liba-darker/98 backdrop-blur-sm" aria-hidden="true">
    <nav class="flex flex-col px-6 py-8 gap-1 text-lg font-medium text-white" aria-label="Mobile">
      <a href="index.php#services" class="mobile-nav-link py-4 border-b border-white/10">Services</a>
      <a href="index.php#about" class="mobile-nav-link py-4 border-b border-white/10">About</a>
      <a href="blog.php" class="mobile-nav-link py-4 border-b border-white/10">Blog</a>
      <a href="index.php#contact" class="mobile-nav-link py-4 border-b border-white/10">Contact</a>
      <a href="tel:+251942816768" class="mt-6 flex items-center justify-center gap-2 rounded-2xl bg-liba-accent text-liba-darker py-4 font-semibold">+251 942 81 6768</a>
    </nav>
  </div>
</header>
