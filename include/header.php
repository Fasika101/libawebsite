<?php
require_once __DIR__ . '/site.php';
$siteName = 'Liba Digitals';
$defaultTitle = "Home - {$siteName} | Digital Solutions Provider";
$defaultDescription = 'Liba Digitals - Transforming businesses through innovative digital solutions. Custom software, healthcare systems, web development, and digital marketing.';

$pageTitle = $pageTitle ?? $defaultTitle;
$pageDescription = $pageDescription ?? $defaultDescription;
$pageImage = $pageImage ?? 'image/logo.png';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'libadigitals.com';
$basePath = dirname($_SERVER['SCRIPT_NAME'] ?? '');
if ($basePath === '/' || $basePath === '\\') $basePath = '';
$baseUrl = $protocol . '://' . $host . $basePath;
$pageUrl = $pageUrl ?? ($baseUrl . ($_SERVER['REQUEST_URI'] ?? ''));
$fullPageImage = (strpos($pageImage, 'http') === 0) ? $pageImage : $baseUrl . '/' . ltrim($pageImage, '/');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($pageUrl); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($fullPageImage); ?>">
    <meta property="og:image:secure_url" content="<?php echo htmlspecialchars(str_replace('http://', 'https://', $fullPageImage)); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
    <meta property="og:locale" content="en_US">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($pageUrl); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($fullPageImage); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/liba-theme.css">
    <link rel="icon" href="image/logo.jpg">
</head>
