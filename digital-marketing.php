<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>

<body>
    <!-- Header Section -->
    <header>
        <?php include 'include/navbar.php'; ?>
    </header>

    <!-- Sidebar Section -->
    <aside>
        <?php include 'include/sidebar.php'; ?>
    </aside>

    <!-- Main Section -->
    <main id="main-content">
        <!-- Banner Section -->
        <div class="section-banner-inner inner-background">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-3">
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Digital Marketing <span class="heading-wrapper">Portfolio</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="digital-marketing.php">Digital Marketing</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Intro Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center">
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Strategic Marketing Solutions to Grow Your Business</h2>
                    <p class="dm-intro-text">We help businesses build a strong online presence, engage with their audience, and achieve measurable results through data-driven marketing strategies.</p>
                    <a href="contact.php" class="btn btn-accent align-self-center">Get Started</a>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="section bg-accent-color-4">
            <div class="hero-container">
                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 g-4">
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter dm-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="150"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Campaigns Delivered</h6>
                            <i class="fa-solid fa-bullhorn dm-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter dm-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="95"></span>
                                <span class="counter-detail">%</span>
                            </div>
                            <h6 class="font-1">Average ROI Increase</h6>
                            <i class="fa-solid fa-chart-line dm-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter dm-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="50"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Happy Clients</h6>
                            <i class="fa-solid fa-users dm-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter dm-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="12"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Platforms Managed</h6>
                            <i class="fa-solid fa-share-nodes dm-stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center mb-5">
                    <h4 class="accent-color">// Performance Insights</h4>
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Marketing Channel Effectiveness</h2>
                </div>
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-4">
                    <div class="col">
                        <div class="card dm-chart-card">
                            <h5 class="dm-chart-title">Channel Mix — Typical Results</h5>
                            <div class="dm-chart-wrapper">
                                <canvas id="dmChannelChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card dm-chart-card">
                            <h5 class="dm-chart-title">Client Growth Metrics</h5>
                            <div class="dm-chart-wrapper">
                                <canvas id="dmGrowthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Digital Marketing Services Section -->
        <div class="section bg-accent-color-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="d-flex flex-column flex-md-row gspace-md-0 gspace-2">
                        <div class="heading-wrapper-title">
                            <div class="row row-cols-xl-2 row-cols-1 gx-0 gy-3">
                                <div class="col col-xl-4">
                                    <h4 class="accent-color">// Our Services</h4>
                                </div>
                                <div class="col col-xl-8 overflow-hidden">
                                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Our Digital Marketing Services</h2>
                                </div>
                            </div>
                        </div>
                        <div class="heading-wrapper-text">
                            <p>Comprehensive solutions across social media, SEO, content marketing, and more.</p>
                        </div>
                    </div>

                    <!-- 1. Social Media Management -->
                    <div class="dm-service-block">
                        <div class="dm-service-header">
                            <div class="dm-service-icon-wrap">
                                <i class="fa-brands fa-meta"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">1. Social Media Management</h3>
                                <h4 class="accent-color-3">Strategic Social Media Solutions</h4>
                            </div>
                        </div>
                        <p class="dm-overview">We help businesses build a strong social media presence, engage with their audience, and drive meaningful results through strategic content creation, community management, and data-driven social media strategies.</p>
                        
                        <h5 class="dm-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-pen-nib"></i><span>Content Strategy & Design</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-globe"></i><span>Multi-Platform Management</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-comments"></i><span>Community Engagement</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-bullhorn"></i><span>Social Media Advertising</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-chart-pie"></i><span>Analytics & Reporting</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-shield-halved"></i><span>Brand Monitoring & Crisis Mgmt</span></div></div>
                        </div>

                        <h5 class="dm-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-2">
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Brand Awareness</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="92"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Engagement Rate</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="88"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Lead Generation</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="85"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Cost Efficiency</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="90"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Digital Marketing Services -->
                    <div class="dm-service-block">
                        <div class="dm-service-header">
                            <div class="dm-service-icon-wrap dm-service-icon-2">
                                <i class="fa-solid fa-magnifying-glass-chart"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">2. Digital Marketing Services</h3>
                                <h4 class="accent-color-3">Comprehensive Marketing Strategies</h4>
                            </div>
                        </div>
                        <p class="dm-overview">Our comprehensive digital marketing services help businesses reach their target audience, generate leads, and achieve measurable ROI through data-driven strategies across multiple channels and platforms.</p>
                        
                        <h5 class="dm-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-magnifying-glass"></i><span>SEO & Local SEO</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-hand-holding-dollar"></i><span>PPC & Paid Ads</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-file-lines"></i><span>Content Marketing</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-envelope"></i><span>Email Marketing</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-gears"></i><span>Marketing Automation</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-arrow-trend-up"></i><span>Conversion Optimization</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-video"></i><span>Video Marketing</span></div></div>
                            <div class="col"><div class="dm-feature-card"><i class="fa-solid fa-link"></i><span>Affiliate Programs</span></div></div>
                        </div>

                        <h5 class="dm-subtitle">Typical Results</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-2">
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Website Traffic Growth</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="95"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Conversion Rate</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="75"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">ROI Improvement</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="95"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress-container">
                                    <div class="progress-title">Brand Visibility</div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar" data-progress-target="88"></div>
                                        <div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Full feature lists (collapsible / accordion style) -->
                    <div class="accordion dm-accordion" id="dmFullFeatures">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dmSocialFeatures" aria-expanded="false">View All Social Media Features</button>
                            </h2>
                            <div id="dmSocialFeatures" class="accordion-collapse collapse" data-bs-parent="#dmFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list">
                                        <li><strong>Content Strategy Development</strong> — Custom content plans aligned with your brand voice, business goals, and target audience.</li>
                                        <li><strong>Content Creation & Design</strong> — High-quality graphics, videos, infographics tailored for each platform.</li>
                                        <li><strong>Multi-Platform Management</strong> — Facebook, Instagram, Twitter, LinkedIn, TikTok, YouTube, Pinterest.</li>
                                        <li><strong>Community Engagement</strong> — Active monitoring and response to comments, messages, reviews.</li>
                                        <li><strong>Social Media Advertising</strong> — Targeted ad campaigns to drive conversions.</li>
                                        <li><strong>Influencer Partnerships</strong> — Strategic collaborations to expand reach.</li>
                                        <li><strong>Analytics & Performance Reporting</strong> — Detailed reports with actionable recommendations.</li>
                                        <li><strong>Brand Monitoring & Reputation Management</strong> — Track mentions and sentiment.</li>
                                        <li><strong>Crisis Management</strong> — Proactive handling of PR situations.</li>
                                        <li><strong>Social Commerce Integration</strong> — Shopping features and direct sales.</li>
                                        <li><strong>Hashtag Research & Strategy</strong> — Effective hashtag campaigns.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dmDigitalFeatures" aria-expanded="false">View All Digital Marketing Features</button>
                            </h2>
                            <div id="dmDigitalFeatures" class="accordion-collapse collapse" data-bs-parent="#dmFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list">
                                        <li><strong>SEO</strong> — Keyword research, content optimization, link building, technical & local SEO.</li>
                                        <li><strong>PPC</strong> — Google Ads, Bing Ads, social advertising with conversion tracking.</li>
                                        <li><strong>Content Marketing</strong> — Blog posts, articles, infographics, case studies, video content.</li>
                                        <li><strong>Email Marketing</strong> — Automated campaigns, newsletters, drip sequences, A/B testing.</li>
                                        <li><strong>Marketing Automation</strong> — Lead nurturing, CRM integration.</li>
                                        <li><strong>Conversion Rate Optimization</strong> — A/B testing, landing page optimization.</li>
                                        <li><strong>Analytics & Reporting</strong> — Google Analytics, KPI monitoring, ROI measurement.</li>
                                        <li><strong>Local SEO</strong> — Google My Business, local citations.</li>
                                        <li><strong>Video Marketing</strong> — Promotional videos, YouTube optimization.</li>
                                        <li><strong>Affiliate Marketing</strong> — Partner programs, referral systems.</li>
                                        <li><strong>Comprehensive Strategy</strong> — Custom plans, competitive research.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="section join-us-banner">
            <div class="hero-container">
                <div class="join-us-content">
                    <h2 class="accent-color-3 animate-box animate__animated animated" data-animate="animate__fadeInUp">Ready to Grow Your Business?</h2>
                    <p class="accent-color-3">Let's discuss how our digital marketing services can help you reach your target audience and achieve your business goals.</p>
                    <div class="d-flex flex-row flex-wrap align-self-center justify-content-center gspace-2">
                        <a href="contact.php" class="btn btn-accent">Get in Touch</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <?php include 'include/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/swiper-script.js"></script>
    <script src="js/submit-form.js"></script>
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <script src="js/vendor/fslightbox.js"></script>
    <script src="js/video_embedded.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var accent = '#008A16';
        var accent2 = '#0B3015';
        var colors = [accent, accent2, '#76D88B', '#146b28', '#3d9a4a', '#1f6b32'];

        var channelCtx = document.getElementById('dmChannelChart');
        if (channelCtx) {
            new Chart(channelCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Social Media', 'SEO', 'Content', 'Email', 'PPC', 'Other'],
                    datasets: [{
                        data: [28, 22, 18, 15, 12, 5],
                        backgroundColor: colors,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    },
                    cutout: '60%'
                }
            });
        }

        var growthCtx = document.getElementById('dmGrowthChart');
        if (growthCtx) {
            new Chart(growthCtx, {
                type: 'bar',
                data: {
                    labels: ['Traffic', 'Leads', 'Conversions', 'ROI', 'Engagement'],
                    datasets: [{
                        label: 'Avg. Improvement %',
                        data: [85, 72, 68, 95, 88],
                        backgroundColor: [accent, accent2, accent, accent2, accent],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: { beginAtZero: true, max: 100 }
                    }
                }
            });
        }
    });
    </script>
</body>
</html>
