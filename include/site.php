<?php

function site_db(): ?PDO
{
    static $pdo = false;
    if ($pdo !== false) {
        return $pdo;
    }

    try {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=libaweb_db;charset=utf8mb4',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (Throwable $e) {
        $pdo = null;
    }

    return $pdo;
}

function site_settings(): array
{
    static $settings = null;
    if ($settings !== null) {
        return $settings;
    }

    $settings = [
        'phone_primary' => '+251 942 81 6768',
        'phone_secondary' => '+251 901 20 8372',
        'email_primary' => 'info@libadigitals.com',
        'email_sales' => 'sales@libadigitals.com',
        'address' => 'Addis Ababa, Ethiopia',
        'hours_weekday' => 'Monday - Friday: 9:00 AM - 6:00 PM',
        'hours_saturday' => 'Saturday: 10:00 AM - 4:00 PM',
        'blog_heading' => 'Blog',
        'blog_intro' => 'Notes and updates from Liba Digitals.',
        'travel_blog_heading' => 'Travel notes',
        'travel_blog_intro' => 'Flight, hotel, and travel notes from Liba Travel in Addis Ababa.',
        'main_logo' => 'image/new_logo.png',
        'main_footer_logo' => 'image/footer_logo.png',
        'main_favicon' => 'image/logo.jpg',
        'travel_logo' => 'assets/logo_main.png',
        'travel_favicon' => 'assets/favicon.png',
    ];

    $db = site_db();
    if (!$db) {
        return $settings;
    }

    try {
        $rows = $db->query('SELECT setting_key, setting_value FROM site_settings')->fetchAll();
        foreach ($rows as $row) {
            if (str_starts_with($row['setting_key'], 'gemini_')) {
                continue;
            }
            if ($row['setting_value'] !== null && $row['setting_value'] !== '') {
                $settings[$row['setting_key']] = $row['setting_value'];
            }
        }
    } catch (Throwable $e) {
        return $settings;
    }

    return $settings;
}

function site_setting(string $key): string
{
    $settings = site_settings();
    return $settings[$key] ?? '';
}

function published_posts(string $channel = 'main'): array
{
    $db = site_db();
    if (!$db || !in_array($channel, ['main', 'travel'], true)) {
        return [];
    }

    try {
        $statement = $db->prepare("SELECT title, slug, excerpt, cover_image, published_at FROM blog_posts WHERE status = 'published' AND channel = ? ORDER BY published_at DESC, id DESC");
        $statement->execute([$channel]);
        return $statement->fetchAll();
    } catch (Throwable $e) {
        return [];
    }
}

function find_published_post(string $slug, string $channel = 'main'): ?array
{
    $db = site_db();
    if (!$db || $slug === '' || !in_array($channel, ['main', 'travel'], true)) {
        return null;
    }

    try {
        $statement = $db->prepare("SELECT * FROM blog_posts WHERE slug = ? AND status = 'published' AND channel = ? LIMIT 1");
        $statement->execute([$slug, $channel]);
        $post = $statement->fetch();
        return $post ?: null;
    } catch (Throwable $e) {
        return null;
    }
}

function record_visit(): void
{
    static $recorded = false;
    if ($recorded || PHP_SAPI === 'cli') {
        return;
    }
    $recorded = true;

    $db = site_db();
    if (!$db) {
        return;
    }

    $agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (preg_match('/bot|crawl|spider|slurp|preview|facebookexternalhit|wget/i', $agent)) {
        return;
    }

    $ip = visitor_ip();
    if ($ip === '') {
        return;
    }

    $page = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';
    $page = substr($page, 0, 255);
    $site = str_contains(str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? ''), '/travel/') ? 'travel' : 'main';
    $now = gmdate('Y-m-d H:i:s');

    try {
        $recent = $db->prepare('SELECT id FROM visits WHERE ip = ? AND page = ? AND created_at >= ? LIMIT 1');
        $recent->execute([$ip, $page, gmdate('Y-m-d H:i:s', time() - 600)]);
        if ($recent->fetch()) {
            return;
        }

        [$code, $name] = visitor_place($db, $ip);
        $insert = $db->prepare('INSERT INTO visits (ip, country_code, country_name, page, site, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $insert->execute([$ip, $code, $name, $page, $site, $now, $now]);
    } catch (Throwable $e) {
        return;
    }
}

function visitor_ip(): string
{
    $candidates = [];
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $candidates[] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        foreach (explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']) as $part) {
            $candidates[] = trim($part);
        }
    }
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $candidates[] = $_SERVER['REMOTE_ADDR'];
    }

    foreach ($candidates as $candidate) {
        if (filter_var($candidate, FILTER_VALIDATE_IP)) {
            return $candidate;
        }
    }

    return '';
}

function visitor_place(PDO $db, string $ip): array
{
    if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
        return [null, 'Local network'];
    }

    try {
        $known = $db->prepare("SELECT country_code, country_name FROM visits WHERE ip = ? AND country_name IS NOT NULL AND country_name != '' ORDER BY id DESC LIMIT 1");
        $known->execute([$ip]);
        $row = $known->fetch();
        if ($row) {
            return [$row['country_code'] ?: null, $row['country_name']];
        }
    } catch (Throwable $e) {
        return [null, null];
    }

    $lookup = visitor_lookup($ip);

    return [$lookup['code'], $lookup['name']];
}

function visitor_lookup(string $ip): array
{
    $url = 'http://ip-api.com/json/' . rawurlencode($ip) . '?fields=status,country,countryCode';
    $context = stream_context_create([
        'http' => ['timeout' => 1.5],
    ]);
    $body = @file_get_contents($url, false, $context);
    $data = is_string($body) ? json_decode($body, true) : null;
    if (!is_array($data) || ($data['status'] ?? '') !== 'success') {
        return ['code' => null, 'name' => null];
    }

    $code = strtoupper(substr((string) ($data['countryCode'] ?? ''), 0, 2));
    $name = substr(trim((string) ($data['country'] ?? '')), 0, 100);

    return [
        'code' => preg_match('/^[A-Z]{2}$/', $code) ? $code : null,
        'name' => $name !== '' ? $name : null,
    ];
}

record_visit();
