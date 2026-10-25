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

function published_posts(): array
{
    $db = site_db();
    if (!$db) {
        return [];
    }

    try {
        $statement = $db->query("SELECT title, slug, excerpt, cover_image, published_at FROM blog_posts WHERE status = 'published' ORDER BY published_at DESC, id DESC");
        return $statement->fetchAll();
    } catch (Throwable $e) {
        return [];
    }
}

function find_published_post(string $slug): ?array
{
    $db = site_db();
    if (!$db || $slug === '') {
        return null;
    }

    try {
        $statement = $db->prepare("SELECT * FROM blog_posts WHERE slug = ? AND status = 'published' LIMIT 1");
        $statement->execute([$slug]);
        $post = $statement->fetch();
        return $post ?: null;
    } catch (Throwable $e) {
        return null;
    }
}
