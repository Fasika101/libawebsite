
<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
<style>
    strong  {   padding-left: 20px !important; }

</style>
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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Systems <span class="heading-wrapper">Portfolio</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="systems.php">Our Systems</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Intro Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center">
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Enterprise Software Solutions & Development Services</h2>
                    <p class="sys-intro-text">We specialize in developing robust, scalable software systems that streamline operations and drive business growth. Explore our comprehensive systems portfolio below.</p>
                    <a href="contact.php" class="btn btn-accent align-self-center">Get Started</a>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="section bg-accent-color-4">
            <div class="hero-container">
                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 g-4">
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter sys-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="100"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Projects Delivered</h6>
                            <i class="fa-solid fa-folder-open sys-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter sys-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="4"></span>
                                <span class="counter-detail"></span>
                            </div>
                            <h6 class="font-1">Core System Types</h6>
                            <i class="fa-solid fa-layer-group sys-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter sys-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="98"></span>
                                <span class="counter-detail">%</span>
                            </div>
                            <h6 class="font-1">Client Satisfaction</h6>
                            <i class="fa-solid fa-star sys-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter sys-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="50"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Happy Clients</h6>
                            <i class="fa-solid fa-users sys-stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center mb-5">
                    <h4 class="accent-color">// Systems Overview</h4>
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Solution Distribution & Impact</h2>
                </div>
                <div class="row row-cols-xl-2 row-cols-1 grid-spacer-4">
                    <div class="col">
                        <div class="card sys-chart-card">
                            <h5 class="sys-chart-title">Systems Portfolio Mix</h5>
                            <div class="sys-chart-wrapper">
                                <canvas id="sysPortfolioChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card sys-chart-card">
                            <h5 class="sys-chart-title">Typical Efficiency Gains</h5>
                            <div class="sys-chart-wrapper">
                                <canvas id="sysEfficiencyChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Systems Solutions Section -->
        <div class="section bg-accent-color-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="d-flex flex-column flex-md-row gspace-md-0 gspace-2">
                        <div class="heading-wrapper-title">
                            <div class="row row-cols-xl-2 row-cols-1 gx-0 gy-3">
                                <div class="col col-xl-4">
                                    <h4 class="accent-color">// Our Solutions</h4>
                                </div>
                                <div class="col col-xl-8 overflow-hidden">
                                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Our Systems Solutions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="heading-wrapper-text">
                            <p>Comprehensive software solutions for management, inventory, mobile, and web.</p>
                        </div>
                    </div>

                    <!-- 1. Custom Management Systems -->
                    <div class="sys-service-block">
                        <div class="sys-service-header">
                            <div class="sys-service-icon-wrap">
                                <i class="fa-solid fa-gears"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">1. Custom Management Systems</h3>
                                <h4 class="accent-color-3">Specialized Solutions for Unique Business Needs</h4>
                            </div>
                        </div>
                        <p class="sys-overview">We develop specialized management systems that address unique business challenges and streamline operations across various departments. These custom solutions are designed to fit your exact requirements and workflows.</p>
                        <h5 class="sys-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-diagram-project"></i><span>Project Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-file-lines"></i><span>Document Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-box-archive"></i><span>Asset Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-clipboard-check"></i><span>Quality Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-building"></i><span>Facility Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-graduation-cap"></i><span>Learning Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-arrows-rotate"></i><span>Workflow Automation</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-chart-pie"></i><span>Custom Reporting & Analytics</span></div></div>
                        </div>
                        <h5 class="sys-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Operational Efficiency</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="92"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Resource Utilization</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="88"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Compliance Adherence</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="95"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Process Streamlining</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="90"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 2. Stock & Inventory Management -->
                    <div class="sys-service-block">
                        <div class="sys-service-header">
                            <div class="sys-service-icon-wrap sys-service-icon-2">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">2. Stock & Inventory Management Systems</h3>
                                <h4 class="accent-color-3">Advanced Inventory Control for Optimal Operations</h4>
                            </div>
                        </div>
                        <p class="sys-overview">Comprehensive stock management solutions that provide real-time visibility and control over your inventory, ensuring optimal stock levels, reducing costs, and preventing stockouts or overstocking situations.</p>
                        <h5 class="sys-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-clock"></i><span>Real-Time Inventory Tracking</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-barcode"></i><span>Barcode & RFID Integration</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-warehouse"></i><span>Multi-Location Management</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-rotate"></i><span>Automated Reordering</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-calculator"></i><span>Advanced Stock Valuation</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-hashtag"></i><span>Batch & Serial Tracking</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-history"></i><span>Complete Audit Trail</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-plug"></i><span>System Integration</span></div></div>
                        </div>
                        <h5 class="sys-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Stockout Reduction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="94"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Cash Flow Improvement</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="87"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Customer Satisfaction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="91"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Carrying Cost Reduction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="85"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 3. Mobile Application Development -->
                    <div class="sys-service-block">
                        <div class="sys-service-header">
                            <div class="sys-service-icon-wrap sys-service-icon-3">
                                <i class="fa-solid fa-mobile-screen"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">3. Mobile Application Development</h3>
                                <h4 class="accent-color-3">Native & Cross-Platform Mobile Solutions</h4>
                            </div>
                        </div>
                        <p class="sys-overview">We create powerful, user-friendly mobile applications for iOS and Android platforms that deliver exceptional user experiences and drive business objectives. Our mobile solutions engage customers, streamline operations, and open new revenue opportunities.</p>
                        <h5 class="sys-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="sys-feature-card"><i class="fa-brands fa-apple"></i><span>Native iOS & Android</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-mobile"></i><span>Cross-Platform (React/Flutter)</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-palette"></i><span>UI/UX Design Excellence</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-building-user"></i><span>Enterprise Mobile Apps</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-cart-shopping"></i><span>E-Commerce Mobile Apps</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-users"></i><span>Social & Community Apps</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-wifi"></i><span>IoT & Smart Device Integration</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-bell"></i><span>Push Notifications & ASO</span></div></div>
                        </div>
                        <h5 class="sys-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Customer Engagement</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="89"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Brand Visibility</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="93"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Revenue Growth</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="86"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Operational Productivity</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="90"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 4. Website Development & Design -->
                    <div class="sys-service-block">
                        <div class="sys-service-header">
                            <div class="sys-service-icon-wrap sys-service-icon-4">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">4. Website Development & Design</h3>
                                <h4 class="accent-color-3">Modern, Responsive Web Solutions</h4>
                            </div>
                        </div>
                        <p class="sys-overview">We design and develop stunning, high-performance websites that reflect your brand identity and deliver exceptional user experiences across all devices. Our web solutions are optimized for performance, SEO, and conversion.</p>
                        <h5 class="sys-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-mobile-screen-button"></i><span>Responsive Web Design</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-store"></i><span>E-Commerce Platforms</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-pen-ruler"></i><span>Content Management Systems</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-window-maximize"></i><span>Custom Web Applications</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-rocket"></i><span>Progressive Web Apps</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-magnifying-glass"></i><span>SEO Optimization</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-gauge-high"></i><span>Performance Optimization</span></div></div>
                            <div class="col"><div class="sys-feature-card"><i class="fa-solid fa-shield-halved"></i><span>Security & Integrations</span></div></div>
                        </div>
                        <h5 class="sys-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Online Presence</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="96"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Conversion Rates</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="88"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Customer Reach</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="94"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">24/7 Availability</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="100"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- Full feature accordions -->
                    <div class="accordion sys-accordion" id="sysFullFeatures">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sysCustomFeatures" aria-expanded="false">View All Custom Management Features</button>
                            </h2>
                            <div id="sysCustomFeatures" class="accordion-collapse collapse" data-bs-parent="#sysFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list sys-feature-list">
                                        <li><strong>Project Management Systems</strong> — Task scheduling, resource allocation, Gantt charts, milestone tracking, team collaboration.</li>
                                        <li><strong>Document Management Systems</strong> — Version control, collaborative editing, access permissions, automated workflow approvals.</li>
                                        <li><strong>Asset Management Systems</strong> — Lifecycle tracking, maintenance schedules, depreciation, compliance reporting.</li>
                                        <li><strong>Quality Management Systems</strong> — ISO compliance, audit management, non-conformance tracking, corrective actions.</li>
                                        <li><strong>Facility Management Systems</strong> — Maintenance scheduling, space planning, work order management, vendor coordination.</li>
                                        <li><strong>Learning Management Systems</strong> — Training programs, course management, progress tracking, certifications.</li>
                                        <li><strong>Workflow Automation</strong> — Automated processes, customizable rules and triggers.</li>
                                        <li><strong>Custom Reporting & Analytics</strong> — Tailored reports, real-time dashboards, data visualization.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sysInventoryFeatures" aria-expanded="false">View All Inventory Management Features</button>
                            </h2>
                            <div id="sysInventoryFeatures" class="accordion-collapse collapse" data-bs-parent="#sysFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list sys-feature-list">
                                        <li><strong>Real-Time Inventory Tracking</strong> — Live stock levels across warehouses with instant transaction updates.</li>
                                        <li><strong>Barcode & RFID Integration</strong> — Automated scanning for accurate counts and reduced error.</li>
                                        <li><strong>Multi-Location Management</strong> — Centralized control across warehouses, stores, distribution centers.</li>
                                        <li><strong>Automated Reordering</strong> — Smart reorder points, automatic PO generation based on trends.</li>
                                        <li><strong>Advanced Stock Valuation</strong> — FIFO, LIFO, weighted average costing methods.</li>
                                        <li><strong>Batch & Serial Number Tracking</strong> — Complete traceability for quality control and recalls.</li>
                                        <li><strong>Complete Audit Trail</strong> — Detailed history of all movements and adjustments.</li>
                                        <li><strong>System Integration</strong> — POS, e-commerce, accounting, supplier systems.</li>
                                        <li><strong>Automated Alerts</strong> — Low stock, expiring items, slow-moving inventory.</li>
                                        <li><strong>Comprehensive Reporting</strong> — Stock levels, turnover rates, valuation, aging analysis.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sysMobileFeatures" aria-expanded="false">View All Mobile App Features</button>
                            </h2>
                            <div id="sysMobileFeatures" class="accordion-collapse collapse" data-bs-parent="#sysFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list sys-feature-list">
                                        <li><strong>Native Development</strong> — iOS (Swift) and Android (Kotlin/Java) applications.</li>
                                        <li><strong>Cross-Platform</strong> — React Native and Flutter for multi-platform deployment.</li>
                                        <li><strong>UI/UX Design</strong> — Intuitive interfaces with high user satisfaction.</li>
                                        <li><strong>Enterprise Apps</strong> — Internal operations, field service, workforce collaboration.</li>
                                        <li><strong>E-Commerce Apps</strong> — Secure payments, catalogs, wishlists, order tracking.</li>
                                        <li><strong>Social & Community Apps</strong> — Real-time messaging, content sharing, user profiles.</li>
                                        <li><strong>IoT Integration</strong> — Connected devices, wearables, smart hardware.</li>
                                        <li><strong>API & Backend Integration</strong> — Connection with existing systems and cloud platforms.</li>
                                        <li><strong>Push Notifications</strong> — Targeted messaging and engagement features.</li>
                                        <li><strong>App Store Optimization</strong> — ASO strategies for maximum visibility.</li>
                                        <li><strong>Ongoing Maintenance</strong> — Updates, bug fixes, security patches.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sysWebFeatures" aria-expanded="false">View All Website Development Features</button>
                            </h2>
                            <div id="sysWebFeatures" class="accordion-collapse collapse" data-bs-parent="#sysFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list sys-feature-list">
                                        <li><strong>Responsive Web Design</strong> — Mobile-first, perfect display on all devices.</li>
                                        <li><strong>E-Commerce Platforms</strong> — Payment gateways, shopping carts, order processing.</li>
                                        <li><strong>Content Management Systems</strong> — WordPress, Drupal, custom CMS.</li>
                                        <li><strong>Custom Web Applications</strong> — Portals, dashboards, booking systems.</li>
                                        <li><strong>Progressive Web Apps</strong> — Offline capabilities, push notifications.</li>
                                        <li><strong>SEO Optimization</strong> — Meta tags, structured data, sitemaps.</li>
                                        <li><strong>Performance Optimization</strong> — Fast loading, optimized images, CDN.</li>
                                        <li><strong>Security Features</strong> — SSL, encryption, security audits.</li>
                                        <li><strong>Third-Party Integrations</strong> — CRM, analytics, payment processors.</li>
                                        <li><strong>Maintenance & Support</strong> — Updates, backups, technical support.</li>
                                        <li><strong>Hosting & Domain</strong> — Reliable hosting, domain registration.</li>
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
                    <h2 class="accent-color-3 animate-box animate__animated animated" data-animate="animate__fadeInUp">Ready to Transform Your Business?</h2>
                    <p class="accent-color-3">Let's discuss how our systems solutions can streamline your operations and drive growth. From custom management systems to inventory control, mobile applications to web development—we deliver robust, scalable solutions tailored to your needs.</p>
                    <div class="d-flex flex-row flex-wrap align-self-center justify-content-center gspace-2">
                        <a href="contact.php" class="btn btn-accent">Get in Touch</a>
                        <div class="link-wrapper">
                            <a href="portfolio.php">View Our Portfolio</a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
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
        var colors = [accent, accent2, '#76D88B', '#146b28'];

        var portfolioCtx = document.getElementById('sysPortfolioChart');
        if (portfolioCtx) {
            new Chart(portfolioCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Management Systems', 'Inventory', 'Mobile Apps', 'Web Development'],
                    datasets: [{
                        data: [30, 25, 25, 20],
                        backgroundColor: colors,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom' } },
                    cutout: '60%'
                }
            });
        }

        var efficiencyCtx = document.getElementById('sysEfficiencyChart');
        if (efficiencyCtx) {
            new Chart(efficiencyCtx, {
                type: 'bar',
                data: {
                    labels: ['Efficiency', 'Cost Reduction', 'Accuracy', 'Compliance', 'Productivity'],
                    datasets: [{
                        label: 'Avg. Improvement %',
                        data: [85, 78, 92, 95, 88],
                        backgroundColor: [accent, accent2, accent, accent2, accent],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, max: 100 } }
                }
            });
        }
    });
    </script>
</body>
</html>
