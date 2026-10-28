<?php
require_once dirname(__DIR__) . '/include/site.php';
$travelLogo = site_setting('travel_logo');
$travelFavicon = site_setting('travel_favicon');
$travelFaviconUrl = 'https://libadigitals.com/travel/' . ltrim($travelFavicon, '/');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Primary SEO (update canonical/og URLs if your live path differs) -->
  <title>Liba Travel | Flights, Hotels &amp; Ticket Booking in Addis Ababa, Ethiopia</title>
  <meta name="description" content="Liba Travel by Liba Digitals Trading PLC — Ethiopia travel agency for flight tickets, hotel booking, accommodations and fare options. Based in Addis Ababa Bole. Call +251 942 81 6768." />
  <meta name="keywords" content="Liba Travel, Ethiopia travel agency, Addis Ababa travel, flight tickets Ethiopia, hotel booking Addis Ababa, accommodation Ethiopia, cheap air fares, Bole travel agent, Liba Digitals, international flights Ethiopia, domestic flights Ethiopia, travel booking Ethiopia" />
  <meta name="author" content="Liba Digitals Trading PLC" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <link rel="canonical" href="https://libadigitals.com/travel/" />
  <meta name="geo.region" content="ET-AA" />
  <meta name="geo.placename" content="Addis Ababa, Ethiopia" />
  <meta name="theme-color" content="#082810" />
  <meta name="format-detection" content="telephone=yes" />

  <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Liba Travel" />
  <meta property="og:locale" content="en_ET" />
  <meta property="og:title" content="Liba Travel | Flights, Hotels &amp; Travel Booking in Ethiopia" />
  <meta property="og:description" content="Your travel choices in one place — accommodations, flight tickets and fares from Addis Ababa. Liba Digitals Trading PLC." />
  <meta property="og:url" content="https://libadigitals.com/travel/" />
  <meta property="og:image" content="<?php echo htmlspecialchars($travelFaviconUrl); ?>" />
  <meta property="og:image:alt" content="Liba Travel — Ethiopia travel agency for flights and hotels" />
  <meta property="og:image:width" content="2000" />
  <meta property="og:image:height" content="2000" />
  <meta property="og:image:type" content="image/png" />

  <!-- Twitter / X Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Liba Travel | Ethiopia Travel Agency" />
  <meta name="twitter:description" content="Flight tickets, hotel booking &amp; accommodations in Addis Ababa. Liba Digitals Trading PLC." />
  <meta name="twitter:image" content="<?php echo htmlspecialchars($travelFaviconUrl); ?>" />
  <meta name="twitter:image:alt" content="Liba Travel brand card" />

  <link rel="icon" href="<?php echo htmlspecialchars($travelFavicon); ?>" />
  <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($travelFavicon); ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet" />
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
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "TravelAgency",
    "@id": "https://libadigitals.com/travel/#organization",
    "name": "Liba Travel",
    "alternateName": "Liba Travel Ethiopia",
    "description": "Ethiopia travel agency offering flight ticket booking, hotel reservations, and accommodation options for domestic and international travellers.",
    "url": "https://libadigitals.com/travel/",
    "logo": "https://libadigitals.com/travel/assets/liba_main.png",
    "image": "https://libadigitals.com/travel/assets/share.png",
    "telephone": "+251942816768",
    "email": "travel@libadigitals.com",
    "parentOrganization": {
      "@type": "Organization",
      "name": "Liba Digitals Trading PLC",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Addis Ababa",
        "addressCountry": "ET"
      }
    },
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Bole Dembel Rayuma Bldg 10th flr",
      "addressLocality": "Addis Ababa",
      "addressRegion": "Addis Ababa",
      "addressCountry": "ET"
    },
    "areaServed": ["Ethiopia", "East Africa", "International"],
    "knowsAbout": ["Flight booking", "Hotel booking", "Travel accommodations", "Air fare comparison"],
    "sameAs": []
  }
  </script>
  <style>
    :root {
      --text-body: #334155;
      --text-muted: #64748b;
    }
    body {
      font-feature-settings: "kern" 1, "liga" 1;
    }
    .type-eyebrow {
      font-size: 0.6875rem;
      font-weight: 700;
      letter-spacing: 0.22em;
      text-transform: uppercase;
    }
    .type-display {
      letter-spacing: -0.035em;
      line-height: 1.06;
    }
    .type-lead {
      font-size: 1.0625rem;
      line-height: 1.7;
    }
    @media (min-width: 640px) {
      .type-lead {
        font-size: 1.125rem;
      }
    }
    .type-ticket-label {
      font-family: JetBrains Mono, ui-monospace, monospace;
      font-size: 0.625rem;
      font-weight: 600;
      letter-spacing: 0.16em;
      text-transform: uppercase;
    }
    .boarding-pass__main,
    .boarding-pass__stub p.font-mono,
    .boarding-pass .font-mono {
      font-family: JetBrains Mono, ui-monospace, monospace;
    }
    .hero-surface {
      background-color: #ffffff;
    }
    .hero-grid {
      background-image: radial-gradient(rgb(8 40 16 / 0.06) 1px, transparent 1px);
      background-size: 24px 24px;
    }

    /* Boarding pass shell */
    .boarding-pass {
      --pass-bg: #ffffff;
      --pass-notch: #082810;
      --pass-radius: 1rem;
      position: relative;
      display: flex;
      flex-direction: column;
      background: var(--pass-bg);
      border-radius: var(--pass-radius);
      box-shadow: 0 20px 50px -12px rgb(0 0 0 / 0.45);
      overflow: visible;
      color: #082810;
    }
    .boarding-pass--on-dark {
      --pass-notch: #0a3520;
    }
    .boarding-pass--light-notch {
      --pass-notch: #f8fafc;
    }
    .boarding-pass--hero-notch {
      --pass-notch: #ffffff;
    }

    .boarding-pass__main {
      flex: 1;
      padding: 1.25rem 1.25rem 1rem;
    }
    @media (min-width: 640px) {
      .boarding-pass__main {
        padding: 1.5rem 1.5rem 1.25rem;
      }
    }

    .boarding-pass__perforation {
      position: relative;
      flex-shrink: 0;
      height: 1px;
      margin: 0 0.65rem;
      border-top: 2px dashed #cbd5e1;
    }
    .boarding-pass__perforation::before,
    .boarding-pass__perforation::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 1.125rem;
      height: 1.125rem;
      border-radius: 50%;
      background: var(--pass-notch);
      transform: translateY(-50%);
    }
    .boarding-pass__perforation::before {
      left: -1.35rem;
    }
    .boarding-pass__perforation::after {
      right: -1.35rem;
    }

    @media (min-width: 768px) {
      .boarding-pass--horizontal-md {
        flex-direction: row;
        align-items: stretch;
      }
      .boarding-pass--horizontal-md .boarding-pass__perforation {
        width: 1px;
        height: auto;
        margin: 0.65rem 0;
        border-top: none;
        border-left: 2px dashed #cbd5e1;
      }
      .boarding-pass--horizontal-md .boarding-pass__perforation::before,
      .boarding-pass--horizontal-md .boarding-pass__perforation::after {
        left: 50%;
        right: auto;
        transform: translate(-50%, -50%);
      }
      .boarding-pass--horizontal-md .boarding-pass__perforation::before {
        top: -1.35rem;
      }
      .boarding-pass--horizontal-md .boarding-pass__perforation::after {
        top: auto;
        bottom: -1.35rem;
        transform: translate(-50%, 50%);
      }
    }

    .boarding-pass__stub {
      padding: 1rem 1.25rem 1.25rem;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    }
    @media (min-width: 768px) {
      .boarding-pass--horizontal-md .boarding-pass__stub {
        flex-direction: column;
        justify-content: center;
        width: 5.5rem;
        padding: 1.25rem 0.75rem;
        text-align: center;
      }
    }

    .boarding-pass__barcode {
      display: flex;
      gap: 2px;
      align-items: flex-end;
      height: 2.5rem;
      overflow: hidden;
    }
    .boarding-pass__barcode span {
      display: block;
      width: 3px;
      background: #082810;
      border-radius: 1px;
      animation: barcode-pulse 2.4s ease-in-out infinite;
    }
    .boarding-pass__barcode span:nth-child(odd) {
      animation-delay: 0.15s;
    }
    .boarding-pass__barcode span:nth-child(3n) {
      animation-delay: 0.35s;
    }

    @keyframes barcode-pulse {
      0%, 100% { opacity: 0.35; transform: scaleY(0.85); }
      50% { opacity: 1; transform: scaleY(1); }
    }

    @keyframes pass-float {
      0%, 100% { transform: translateY(0) rotate(-1.5deg); }
      50% { transform: translateY(-10px) rotate(-0.5deg); }
    }

    @keyframes pass-float-delayed {
      0%, 100% { transform: translateY(0) rotate(1.25deg); }
      50% { transform: translateY(-8px) rotate(0.25deg); }
    }

    @keyframes dash-march {
      to { stroke-dashoffset: -20; }
    }

    @keyframes scan-sweep {
      0% { transform: translateX(-120%) skewX(-12deg); opacity: 0; }
      15% { opacity: 0.35; }
      100% { transform: translateX(220%) skewX(-12deg); opacity: 0; }
    }

    .boarding-pass--hero {
      animation: pass-float 5.5s ease-in-out infinite;
      transform-origin: center center;
    }
    .boarding-pass--hero-secondary {
      animation: pass-float-delayed 6.2s ease-in-out infinite;
    }

    .boarding-pass__scan {
      pointer-events: none;
      position: absolute;
      inset: 0;
      border-radius: inherit;
      overflow: hidden;
    }
    .boarding-pass__scan::after {
      content: "";
      position: absolute;
      inset: 0;
      width: 40%;
      background: linear-gradient(90deg, transparent, rgb(61 220 104 / 0.12), transparent);
      animation: scan-sweep 4.5s ease-in-out infinite;
    }

    .boarding-pass--reveal {
      opacity: 0;
      transform: translateY(1.25rem) rotate(-0.5deg);
      transition: opacity 0.65s ease, transform 0.65s ease;
    }
    .boarding-pass--reveal.is-visible {
      opacity: 1;
      transform: translateY(0) rotate(0);
    }
    .boarding-pass--reveal.is-visible:nth-child(2) {
      transition-delay: 0.12s;
    }
    .boarding-pass--reveal.is-visible:nth-child(3) {
      transition-delay: 0.24s;
    }

    .boarding-pass--reveal.is-visible:hover {
      transform: translateY(-4px);
      transition: transform 0.35s ease;
    }
    .boarding-pass__barcode--light span {
      background: rgb(255 255 255 / 0.75);
    }

    .route-plane {
      animation: route-plane 3s ease-in-out infinite;
    }
    @keyframes route-plane {
      0%, 100% { transform: translateX(0); opacity: 0.85; }
      50% { transform: translateX(6px); opacity: 1; }
    }

    @media (prefers-reduced-motion: reduce) {
      .boarding-pass--hero,
      .boarding-pass--hero-secondary,
      .boarding-pass__barcode span,
      .boarding-pass__scan::after,
      .route-plane {
        animation: none !important;
      }
      .boarding-pass--reveal {
        opacity: 1;
        transform: none;
        transition: none;
      }
    }
  </style>
</head>
<body class="font-sans text-slate-700 antialiased bg-white">

  <!-- Header -->
  <header id="site-header" class="fixed top-0 inset-x-0 z-50 transition-shadow duration-300" role="banner">
    <div class="bg-liba-dark/95 backdrop-blur-md border-b border-white/10">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16 sm:h-[4.25rem]">
        <a href="#" class="flex items-center gap-3 shrink-0" aria-label="Liba Travel home">
          <img src="<?php echo htmlspecialchars($travelLogo); ?>" alt="Liba Travel — Ethiopia travel agency" class="h-9 sm:h-10 w-auto" width="" height="200" />
          <span class="hidden sm:block text-white/80 text-sm font-semibold tracking-[0.2em] lowercase border-l border-white/20 pl-3">travel</span>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-sm font-semibold tracking-wide text-white/85" aria-label="Primary">
          <a href="#services" class="hover:text-liba-accent transition-colors">Services</a>
          <a href="#about" class="hover:text-liba-accent transition-colors">About</a>
          <a href="blog.php" class="hover:text-liba-accent transition-colors">Blog</a>
          <a href="#contact" class="hover:text-liba-accent transition-colors">Contact</a>
          <a href="tel:+251942816768" class="inline-flex items-center gap-2 rounded-full bg-liba-accent text-liba-darker px-4 py-2 font-semibold hover:bg-liba-accent-hover transition-colors">
            Call us
          </a>
        </nav>

        <button type="button" id="menu-toggle" class="md:hidden p-2 -mr-2 text-white rounded-lg hover:bg-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-liba-accent" aria-expanded="false" aria-controls="mobile-menu" aria-label="Open menu">
          <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden fixed inset-0 top-16 bg-liba-darker/98 backdrop-blur-sm" aria-hidden="true">
      <nav class="flex flex-col px-6 py-8 gap-1 text-lg font-medium text-white" aria-label="Mobile">
        <a href="#services" class="mobile-nav-link py-4 border-b border-white/10">Services</a>
        <a href="#about" class="mobile-nav-link py-4 border-b border-white/10">About</a>
        <a href="blog.php" class="mobile-nav-link py-4 border-b border-white/10">Blog</a>
        <a href="#contact" class="mobile-nav-link py-4 border-b border-white/10">Contact</a>
        <a href="tel:+251942816768" class="mt-6 flex items-center justify-center gap-2 rounded-2xl bg-liba-accent text-liba-darker py-4 font-semibold">
          +251 942 81 6768
        </a>
        <a href="mailto:travel@libadigitals.com" class="mt-3 flex items-center justify-center rounded-2xl border border-white/25 text-white py-4">
          travel@libadigitals.com
        </a>
      </nav>
    </div>
  </header>

  <main id="main-content">
    <!-- Hero -->
    <section class="hero-surface hero-grid pt-32 sm:pt-36 lg:pt-40 pb-16 sm:pb-24 px-4 sm:px-6 relative overflow-hidden border-b border-slate-100" aria-labelledby="hero-heading">
      <div class="absolute top-20 right-0 w-64 h-64 sm:w-96 sm:h-96 bg-liba-accent/15 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
      <div class="max-w-6xl mx-auto relative grid lg:grid-cols-2 gap-10 lg:gap-12 items-center">
        <div>
          
          <h1 id="hero-heading" class="font-display type-display text-[1.875rem] sm:text-5xl lg:text-[2.875rem] font-extrabold text-liba-dark">
            Your travel choices,<br class="hidden sm:block" />
            <span class="text-liba-dark font-bold">handled with care.</span>
          </h1>
          <p class="mt-5 sm:mt-6 type-lead text-slate-600 max-w-xl">
            <strong class="font-bold text-liba-dark">Liba Travel</strong> is your Addis Ababa travel agency for <strong class="font-semibold text-liba-dark">flight tickets</strong>, <strong class="font-semibold text-liba-dark">hotel booking</strong>, and every type of <strong class="font-semibold text-liba-dark">accommodation</strong> — with clear fare options for domestic and international trips.
          </p>
          <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row gap-3 sm:gap-4">
            <a href="#contact" class="inline-flex items-center justify-center rounded-2xl bg-liba-accent text-liba-darker px-6 py-4 text-base font-bold tracking-wide hover:bg-liba-accent-hover transition-colors shadow-md shadow-liba-dark/10">
              Book travel
            </a>
            <a href="tel:+251942816768" class="inline-flex items-center justify-center rounded-2xl border border-slate-300 text-liba-dark px-6 py-4 text-base font-semibold hover:bg-slate-50 transition-colors">
              +251 942 81 6768
            </a>
          </div>
        </div>

        <div class="relative mx-auto w-full max-w-md lg:max-w-none lg:justify-self-end pt-4 lg:pt-0" aria-hidden="true">
          <div class="boarding-pass boarding-pass--light-notch boarding-pass--hero-notch boarding-pass--horizontal-md boarding-pass--hero relative z-10 shadow-xl shadow-slate-300/40">
            <div class="boarding-pass__scan" aria-hidden="true"></div>
            <div class="boarding-pass__main">
              <div class="flex items-center justify-between gap-2 border-b border-slate-200 pb-3 mb-4">
                <p class="type-ticket-label text-liba-dark/70">Liba Travel</p>
                <p class="type-ticket-label text-liba-accent">BP · Live</p>
              </div>
              <div class="flex items-center justify-between gap-4">
                <div>
                  <p class="type-ticket-label text-slate-500">From</p>
                  <p class="text-2xl sm:text-3xl font-extrabold tracking-tight font-display">ADD</p>
                  <p class="text-xs text-slate-500 mt-0.5">Addis Ababa</p>
                </div>
                <div class="flex-1 flex flex-col items-center px-2 min-w-0">
                  <svg class="route-plane w-8 h-8 text-liba-accent shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M21 16v-2l-8-5V3.5a1.5 1.5 0 00-3 0V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" />
                  </svg>
                  <div class="w-full h-px bg-slate-200 mt-2 relative">
                    <span class="absolute inset-y-0 left-0 w-full border-t border-dashed border-liba-accent/50"></span>
                  </div>
                  <p class="text-[10px] text-slate-400 mt-2 uppercase tracking-wide">Your route</p>
                </div>
                <div class="text-right">
                  <p class="type-ticket-label text-slate-500">To</p>
                  <p class="text-2xl sm:text-3xl font-extrabold tracking-tight font-display">ANY</p>
                  <p class="text-xs text-slate-500 mt-0.5">Worldwide</p>
                </div>
              </div>
              <div class="grid grid-cols-3 gap-2 mt-5 text-center">
                <div class="rounded-lg bg-slate-50 py-2 px-1">
                  <p class="text-[9px] uppercase text-slate-400">Class</p>
                  <p class="text-xs font-semibold">Choice</p>
                </div>
                <div class="rounded-lg bg-slate-50 py-2 px-1">
                  <p class="text-[9px] uppercase text-slate-400">Seat</p>
                  <p class="text-xs font-semibold">Comfort</p>
                </div>
                <div class="rounded-lg bg-slate-50 py-2 px-1">
                  <p class="text-[9px] uppercase text-slate-400">Gate</p>
                  <p class="text-xs font-semibold text-liba-accent">Open</p>
                </div>
              </div>
            </div>
            <div class="boarding-pass__perforation" aria-hidden="true"></div>
            <div class="boarding-pass__stub">
              <div class="boarding-pass__barcode flex-1 md:flex-none" aria-hidden="true">
                <span style="height:70%"></span><span style="height:100%"></span><span style="height:55%"></span><span style="height:90%"></span><span style="height:40%"></span><span style="height:85%"></span><span style="height:65%"></span><span style="height:95%"></span><span style="height:50%"></span><span style="height:75%"></span><span style="height:100%"></span><span style="height:45%"></span>
              </div>
              <p class="text-[10px] font-mono font-bold tracking-widest text-liba-dark/80 md:[writing-mode:vertical-rl] md:rotate-180">LT-2026</p>
            </div>
          </div>

          <div class="boarding-pass boarding-pass--light-notch boarding-pass--hero-notch boarding-pass--hero-secondary absolute -left-2 sm:-left-6 top-[42%] w-[58%] max-w-[220px] opacity-95 scale-[0.92] -z-0 hidden sm:block pointer-events-none shadow-lg shadow-slate-200/80">
            <div class="boarding-pass__main py-3 px-4">
              <p class="text-[9px] font-bold tracking-widest text-slate-400">STAY PASS</p>
              <p class="text-lg font-bold mt-1">HOTEL</p>
              <p class="text-[10px] text-slate-500">All accommodation types</p>
            </div>
            <div class="boarding-pass__perforation"></div>
            <div class="boarding-pass__stub py-2 px-3">
              <p class="text-[9px] font-mono">OK</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-16 sm:py-24 px-4 sm:px-6 bg-slate-50/80" aria-labelledby="services-heading">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-2xl mb-10 sm:mb-14">
          <p class="type-eyebrow text-liba-accent mb-3">Services</p>
          <h2 id="services-heading" class="font-display text-2xl sm:text-4xl font-extrabold text-liba-dark type-display">Flights, hotels &amp; travel fares</h2>
          <p class="mt-4 type-lead text-slate-600">End-to-end travel support in Ethiopia — accommodation booking, air tickets, and fare comparison so you can focus on the journey.</p>
        </div>
        <div class="grid gap-5 sm:gap-6 lg:grid-cols-3">
          <article class="boarding-pass boarding-pass--light-notch boarding-pass--reveal" data-pass-reveal>
            <div class="boarding-pass__main">
              <p class="text-[10px] font-bold tracking-[0.18em] text-liba-accent">BOARDING · 01</p>
              <h3 class="font-display text-xl font-bold text-liba-dark mt-2">Accommodations</h3>
              <p class="mt-2 text-slate-600 text-sm leading-relaxed">Hotels, lodges, and all types of stays matched to your budget, dates, and destination.</p>
              <div class="flex items-end justify-between mt-4 pt-3 border-t border-dashed border-slate-200">
                <div>
                  <p class="text-[9px] uppercase text-slate-400">Zone</p>
                  <p class="text-sm font-semibold">STAY</p>
                </div>
                <div class="text-right">
                  <p class="text-[9px] uppercase text-slate-400">Status</p>
                  <p class="text-sm font-semibold text-liba-accent">Ready</p>
                </div>
              </div>
            </div>
            <div class="boarding-pass__perforation" aria-hidden="true"></div>
            <div class="boarding-pass__stub">
              <div class="boarding-pass__barcode" aria-hidden="true">
                <span style="height:60%"></span><span style="height:100%"></span><span style="height:45%"></span><span style="height:80%"></span><span style="height:55%"></span><span style="height:90%"></span>
              </div>
              <p class="text-[10px] font-mono font-bold">HTL</p>
            </div>
          </article>

          <article class="boarding-pass boarding-pass--light-notch boarding-pass--reveal" data-pass-reveal>
            <div class="boarding-pass__main">
              <p class="text-[10px] font-bold tracking-[0.18em] text-liba-accent">BOARDING · 02</p>
              <h3 class="font-display text-xl font-bold text-liba-dark mt-2">Ticket fares</h3>
              <p class="mt-2 text-slate-600 text-sm leading-relaxed">Flight and travel tickets with clear options — domestic and international routes.</p>
              <div class="flex items-end justify-between mt-4 pt-3 border-t border-dashed border-slate-200">
                <div>
                  <p class="text-[9px] uppercase text-slate-400">Zone</p>
                  <p class="text-sm font-semibold">FLY</p>
                </div>
                <div class="text-right">
                  <p class="text-[9px] uppercase text-slate-400">Status</p>
                  <p class="text-sm font-semibold text-liba-accent">Book</p>
                </div>
              </div>
            </div>
            <div class="boarding-pass__perforation" aria-hidden="true"></div>
            <div class="boarding-pass__stub">
              <div class="boarding-pass__barcode" aria-hidden="true">
                <span style="height:75%"></span><span style="height:40%"></span><span style="height:95%"></span><span style="height:50%"></span><span style="height:85%"></span><span style="height:65%"></span>
              </div>
              <p class="text-[10px] font-mono font-bold">TKT</p>
            </div>
          </article>

          <article class="boarding-pass boarding-pass--light-notch boarding-pass--reveal lg:col-span-1" data-pass-reveal>
            <div class="boarding-pass__main">
              <p class="text-[10px] font-bold tracking-[0.18em] text-liba-accent">BOARDING · 03</p>
              <h3 class="font-display text-xl font-bold text-liba-dark mt-2">Travel choices</h3>
              <p class="mt-2 text-slate-600 text-sm leading-relaxed">Personal guidance to compare routes, stays, and fares so you pick what fits best.</p>
              <div class="flex items-end justify-between mt-4 pt-3 border-t border-dashed border-slate-200">
                <div>
                  <p class="text-[9px] uppercase text-slate-400">Zone</p>
                  <p class="text-sm font-semibold">PLAN</p>
                </div>
                <div class="text-right">
                  <p class="text-[9px] uppercase text-slate-400">Status</p>
                  <p class="text-sm font-semibold text-liba-accent">Guide</p>
                </div>
              </div>
            </div>
            <div class="boarding-pass__perforation" aria-hidden="true"></div>
            <div class="boarding-pass__stub">
              <div class="boarding-pass__barcode" aria-hidden="true">
                <span style="height:50%"></span><span style="height:88%"></span><span style="height:62%"></span><span style="height:100%"></span><span style="height:48%"></span><span style="height:72%"></span>
              </div>
              <p class="text-[10px] font-mono font-bold">LBA</p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about" class="py-16 sm:py-24 px-4 sm:px-6 bg-white" aria-labelledby="about-heading">
      <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
        <div>
          <p class="type-eyebrow text-liba-accent mb-3">About</p>
          <h2 id="about-heading" class="font-display text-2xl sm:text-4xl font-extrabold text-liba-dark type-display">Ethiopia travel agency you can reach</h2>
          <p class="mt-4 type-lead text-slate-600">
            <strong class="text-liba-dark font-bold">Liba Travel</strong> is part of <strong class="text-liba-dark font-bold">Liba Digitals Trading PLC</strong>, a company registered in Ethiopia. We help travellers book hotels, guesthouses, lodges, and flight tickets with dependable local support.
          </p>
          <p class="mt-4 type-lead text-slate-600">
            From Bole, Addis Ababa, we serve business trips, family visits, and holidays — matching accommodations and air fares to your dates, budget, and destination across Ethiopia and abroad.
          </p>
        </div>
        <div class="rounded-3xl bg-liba-dark text-white p-8 sm:p-10 relative overflow-hidden">
          <div class="absolute -bottom-8 -right-8 w-40 h-40 bg-liba-accent/20 rounded-full blur-2xl" aria-hidden="true"></div>
          <p class="type-eyebrow text-liba-accent">Registered in Ethiopia</p>
          <ul class="mt-6 space-y-4 relative">
            <li class="flex gap-3">
              <span class="text-liba-accent mt-0.5">✓</span>
              <span class="text-white/90">Accommodation booking support</span>
            </li>
            <li class="flex gap-3">
              <span class="text-liba-accent mt-0.5">✓</span>
              <span class="text-white/90">Ticket fare options &amp; coordination</span>
            </li>
            <li class="flex gap-3">
              <span class="text-liba-accent mt-0.5">✓</span>
              <span class="text-white/90">Customer-first travel advice</span>
            </li>
          </ul>
          <img src="<?php echo htmlspecialchars($travelLogo); ?>" alt="" class="mt-8 h-8 w-auto opacity-90" width="128" height="32" aria-hidden="true" />
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-16 sm:py-24 px-4 sm:px-6 bg-liba-dark text-white" aria-labelledby="contact-heading">
      <div class="max-w-6xl mx-auto">
        <div class="max-w-2xl mb-10 sm:mb-12">
          <p class="type-eyebrow text-liba-accent mb-3">Contact</p>
          <h2 id="contact-heading" class="font-display text-2xl sm:text-4xl font-extrabold type-display">Book flights &amp; hotels in Addis Ababa</h2>
          <p class="mt-4 type-lead text-white/70">Call or email for travel quotes, ticket fares, and accommodation options — we respond with clear choices.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 max-w-4xl">
          <a href="tel:+251942816768" class="boarding-pass boarding-pass--on-dark boarding-pass--reveal group !text-white !shadow-none ring-1 ring-white/10 hover:ring-liba-accent/40" data-pass-reveal style="--pass-bg: rgb(255 255 255 / 0.06);">
            <div class="boarding-pass__main !bg-transparent">
              <p class="text-[10px] font-bold tracking-widest text-liba-accent">TICKET · CALL</p>
              <p class="mt-2 text-lg font-semibold group-hover:text-liba-accent transition-colors">+251 942 81 6768</p>
            </div>
            <div class="boarding-pass__perforation !border-white/20" aria-hidden="true"></div>
            <div class="boarding-pass__stub !bg-white/5">
              <p class="text-[10px] font-mono text-white/70">PHN</p>
            </div>
          </a>
          <a href="mailto:travel@libadigitals.com" class="boarding-pass boarding-pass--on-dark boarding-pass--reveal group !text-white !shadow-none ring-1 ring-white/10 hover:ring-liba-accent/40" data-pass-reveal style="--pass-bg: rgb(255 255 255 / 0.06);">
            <div class="boarding-pass__main !bg-transparent">
              <p class="text-[10px] font-bold tracking-widest text-liba-accent">TICKET · EMAIL</p>
              <p class="mt-2 text-base font-medium break-all group-hover:text-liba-accent transition-colors">travel@libadigitals.com</p>
            </div>
            <div class="boarding-pass__perforation !border-white/20" aria-hidden="true"></div>
            <div class="boarding-pass__stub !bg-white/5">
              <p class="text-[10px] font-mono text-white/70">TRV</p>
            </div>
          </a>
        </div>
        <div class="mt-5 boarding-pass boarding-pass--on-dark boarding-pass--horizontal-md boarding-pass--reveal max-w-4xl !text-white !shadow-none ring-1 ring-white/10" data-pass-reveal style="--pass-bg: rgb(255 255 255 / 0.06);">
          <div class="boarding-pass__main !bg-transparent">
            <p class="text-[10px] font-bold tracking-widest text-liba-accent">DEPARTURE LOUNGE</p>
            <p class="mt-2 text-sm sm:text-base text-white/90 leading-relaxed">
              Addis Ababa, Bole Dembel Rayuma Bldg 10th flr, Ethiopia
            </p>
            <a href="mailto:info@libadigitals.com" class="inline-block mt-3 text-sm text-liba-accent hover:underline">info@libadigitals.com</a>
          </div>
          <div class="boarding-pass__perforation !border-white/20" aria-hidden="true"></div>
          <div class="boarding-pass__stub !bg-white/5 flex-row md:flex-col gap-2">
            <div class="boarding-pass__barcode boarding-pass__barcode--light opacity-80" aria-hidden="true">
              <span style="height:55%"></span><span style="height:90%"></span><span style="height:40%"></span><span style="height:75%"></span>
            </div>
            <p class="text-[10px] font-mono text-white/60">ADD</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-liba-darker text-white/60 py-10 px-4 sm:px-6 text-sm" role="contentinfo">
    <div class="max-w-6xl mx-auto flex flex-col gap-6">
      <p class="text-center sm:text-left max-w-3xl text-white/50 text-xs sm:text-sm leading-relaxed">
        Liba Travel — Ethiopia travel agency for flight booking, hotel reservations, and accommodation. Liba Digitals Trading PLC, Addis Ababa (Bole).
      </p>
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-center sm:text-left border-t border-white/10 pt-6">
        <p>&copy; <span id="year"></span> Liba Travel · Liba Digitals Trading PLC</p>
        <p class="text-white/45 font-medium tracking-wide">Registered in Ethiopia</p>
      </div>
    </div>
  </footer>

  <script src="js/main.js"></script>
</body>
</html>
