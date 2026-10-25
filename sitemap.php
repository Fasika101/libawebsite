<?php
/**
 * Dynamic XML Sitemap for Liba Digitals
 * Uses current domain - works on localhost, staging, and production
 * Pages ordered: Home first, then main pages, then services, then supporting
 */
header('Content-Type: application/xml; charset=utf-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'libadigitals.com';
$baseUrl = $protocol . '://' . rtrim($host, '/');

$pages = [
    // Home - highest priority
    ['loc' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
    // Main company pages
    ['loc' => $baseUrl . '/about.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => $baseUrl . '/portfolio.php', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => $baseUrl . '/contact.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    // Services / Systems
    ['loc' => $baseUrl . '/systems.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => $baseUrl . '/healthcare.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => $baseUrl . '/digital-marketing.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => $baseUrl . '/blog.php', 'priority' => '0.7', 'changefreq' => 'weekly'],
    // Supporting
    ['loc' => $baseUrl . '/contact_success.php', 'priority' => '0.3', 'changefreq' => 'yearly'],
];

$lastmod = date('Y-m-d');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($pages as $page) {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($page['loc']) . "</loc>\n";
    echo "    <lastmod>{$lastmod}</lastmod>\n";
    echo "    <changefreq>{$page['changefreq']}</changefreq>\n";
    echo "    <priority>{$page['priority']}</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
