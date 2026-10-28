<?php
require_once dirname(__DIR__, 2) . '/include/site.php';
$pageTitle = $pageTitle ?? 'Liba Travel';
$pageDescription = $pageDescription ?? 'Travel notes from Liba Travel in Addis Ababa.';
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>" />
  <meta name="theme-color" content="#082810" />
  <link rel="icon" href="<?php echo htmlspecialchars(site_setting('travel_favicon')); ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            liba: {
              dark: '#082810',
              darker: '#051a0a',
              accent: '#3ddc68',
              'accent-hover': '#2ecc55',
            },
          },
          fontFamily: {
            sans: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
            display: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
            mono: ['JetBrains Mono', 'ui-monospace', 'monospace'],
          },
        },
      },
    };
  </script>
</head>
