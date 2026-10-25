<!DOCTYPE html>
<html lang="en">
<?php include 'include/header.php'; ?>
<body>
    <!-- Header Section -->
    <header>
        <!-- Navbar Section -->
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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Portfolio & <span class="heading-wrapper">Success Stories</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="portfolio.php">Portfolio</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Portfolio Works Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="portfolio-works-header text-center">
                        <p class="portfolio-archive accent-color font-1">ARCHIVE 2021–26</p>
                        <h2 class="portfolio-works-title">Latest Works</h2>
                        <p class="portfolio-works-subtitle">A curation of recent digital products, brand systems, and marketing campaigns.</p>
                    </div>

                    <!-- Filter Tabs -->
                    <div class="portfolio-filter-tabs" role="tablist" aria-label="Portfolio categories">
                        <button class="portfolio-filter-btn active" data-filter="all" type="button">All</button>
                        <button class="portfolio-filter-btn" data-filter="software-dev" type="button">Software Dev</button>
                        <button class="portfolio-filter-btn" data-filter="branding" type="button">Branding</button>
                        <button class="portfolio-filter-btn" data-filter="digital-marketing" type="button">Digital Marketing</button>
                        <button class="portfolio-filter-btn" data-filter="promotion" type="button">Promotion</button>
                    </div>

                    <!-- Portfolio Grid -->
                    <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4 portfolio-grid" id="portfolioGrid">

                        <!-- SOFTWARE DEV -->
                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://menorahtrustees.org" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/menorah.png" alt="Menorah Trustees">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Menorah Trustees Website</h3>
                                    <p>Corporate • Finance • Web Development • 2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://canvasconnect.libadigitals.com" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/canvas.png" alt="Canvas Connect">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Canvas Connect</h3>
                                    <p>Art • Web Development • 2026</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://orbitelectronicsethiopia.com/" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/orbit1.png" alt="Orbit Electronics Ethiopia">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Orbit Electronics Ethiopia</h3>
                                    <p>Electronics • E-Commerce • 2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://newonlineoptics.com/" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/noop.png" alt="New Online Optics">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>New Online Optics</h3>
                                    <p>E-Commerce • Eyewear • CMC, Addis Ababa • 2021</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://shineserviceset.com/" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/shine.png" alt="Shine Cleaning Service">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Shine Cleaning Service</h3>
                                    <p>Services • Addis Ababa • 2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <a href="https://deepcleaninget.com/" target="_blank" rel="noopener" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/deepcleaning.png" alt="Deep Cleaning Services">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Deep Cleaning Services</h3>
                                    <p>Cleaning Services • Web Development • Addis Ababa • 2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>
                        <div class="col portfolio-item" data-category="software-dev">
                            <div class="card card-portfolio-overlay" role="button" tabindex="0"
                                 data-bs-toggle="modal" data-bs-target="#pdfModal"
                                 data-pdf-src="./image/portfolio/mattot-brand.pdf"
                                 data-pdf-title="Mattot Coffee — Brand Identity">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/mattot.png" alt="Mattot Coffee">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Mattot Coffee</h3>
                                    <p>Brand Identity • Coffee • Addis Ababa • 2022</p>
                                    <span class="btn btn-portfolio">VIEW BRAND BOOK</span>
                                </div>
                            </div>
                        </div>

                        <div class="col portfolio-item" data-category="software-dev">
                            <div class="card card-portfolio-overlay" role="button" tabindex="0"
                                 data-bs-toggle="modal" data-bs-target="#pdfModal"
                                 data-pdf-src="./image/portfolio/shine-interior-brand.pdf"
                                 data-pdf-title="Shine Interior Design — Brand Identity">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/interior.png" alt="Shine Interior Design">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Software Dev</span>
                                    <h3>Shine Interior Design</h3>
                                    <p>Brand Identity • Interior Design • Addis Ababa • 2024</p>
                                    <span class="btn btn-portfolio">VIEW BRAND BOOK</span>
                                </div>
                            </div>
                        </div>

                        <!-- BRANDING -->
                      
                        <div class="col portfolio-item" data-category="branding">
                            <div class="card card-portfolio-overlay" role="button" tabindex="0"
                                 data-bs-toggle="modal" data-bs-target="#pdfModal"
                                 data-pdf-src="./image/portfolio/shine-interior-brand.pdf"
                                 data-pdf-title="Shine Interior Design — Brand Identity">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/interior.png" alt="Shine Interior Design">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Branding</span>
                                    <h3>Mrnorah Trustees Community Services</h3>
                                    <p>Brand Identity • Addis Ababa • 2024</p>
                                    <span class="btn btn-portfolio">VIEW BRAND BOOK</span>
                                </div>
                            </div>
                        </div>

                        <!-- DIGITAL MARKETING -->
                        <div class="col portfolio-item" data-category="digital-marketing">
                            <a href="digital-marketing.php" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/digital-marketing.png" alt="Digital Marketing Campaigns">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Digital Marketing</span>
                                    <h3>Digital Marketing Campaigns</h3>
                                    <p>Social Media • SEO • PPC • Addis Ababa • 2023–2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                        <!-- PROMOTION -->
                        <div class="col portfolio-item" data-category="promotion">
                            <a href="#" class="card card-portfolio-overlay">
                                <div class="card-portfolio-image">
                                    <img src="./image/portfolio/promotion.png" alt="Promotional Campaigns">
                                </div>
                                <div class="card-portfolio-overlay-content">
                                    <span class="portfolio-category-tag">Promotion</span>
                                    <h3>Promotional Campaigns</h3>
                                    <p>Events • Activations • Addis Ababa • 2024</p>
                                    <span class="btn btn-portfolio">VIEW CASE STUDY</span>
                                </div>
                            </a>
                        </div>

                    </div><!-- end portfolio-grid -->

                    <!-- No results message -->
                    <div id="portfolioNoResults" class="text-center py-5" style="display:none;">
                        <p class="text-muted">No projects in this category yet. Check back soon.</p>
                    </div>

                    <div class="text-center mt-5">
                        <a href="contact.php" class="btn btn-accent btn-lg">START YOUR PROJECT <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- PDF Viewer Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalTitle">Brand Identity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="pdf-viewer-wrap">
                        <iframe id="pdfViewerFrame"
                                class="pdf-viewer-frame"
                                src=""
                                title="Brand Identity Document"
                                sandbox="allow-same-origin allow-scripts">
                        </iframe>
                        <!-- Transparent overlay blocks right-click / direct save on the PDF -->
                        <div class="pdf-protection-overlay"
                             oncontextmenu="return false;"
                             ondragstart="return false;"
                             onselectstart="return false;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <?php include 'include/footer.php'; ?>
    </footer>

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/swiper-script.js"></script>
    <script src="js/submit-form.js"></script>
    <script src="js/video_embedded.js"></script>

    <script>
    (function () {
        'use strict';

        /* ── Portfolio Filter ── */
        var filterBtns = document.querySelectorAll('.portfolio-filter-btn');
        var portfolioItems = document.querySelectorAll('.portfolio-item');
        var noResults = document.getElementById('portfolioNoResults');

        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                this.classList.add('active');

                var filter = this.dataset.filter;
                var visible = 0;

                portfolioItems.forEach(function (item) {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.classList.remove('hidden');
                        visible++;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                noResults.style.display = visible === 0 ? 'block' : 'none';
            });
        });

        /* ── PDF Modal ── */
        var pdfModal   = document.getElementById('pdfModal');
        var pdfFrame   = document.getElementById('pdfViewerFrame');
        var pdfTitle   = document.getElementById('pdfModalTitle');
        var pdfOpen    = false;

        if (pdfModal) {
            pdfModal.addEventListener('show.bs.modal', function (e) {
                var trigger = e.relatedTarget;
                var src   = trigger ? (trigger.dataset.pdfSrc   || '') : '';
                var title = trigger ? (trigger.dataset.pdfTitle || 'Brand Identity') : 'Brand Identity';

                pdfTitle.textContent = title;
                /* Append #toolbar=0&navpanes=0 to suppress Chrome/Edge PDF toolbar */
                pdfFrame.src = src + '#toolbar=0&navpanes=0&scrollbar=1';
                pdfOpen = true;
            });

            pdfModal.addEventListener('hidden.bs.modal', function () {
                pdfFrame.src = '';
                pdfOpen = false;
            });

            /* Block right-click inside the modal */
            pdfModal.addEventListener('contextmenu', function (e) {
                e.preventDefault();
                return false;
            });
        }

        /* Block Ctrl+S / Ctrl+P / Cmd+S / Cmd+P while PDF modal is open */
        document.addEventListener('keydown', function (e) {
            if (!pdfOpen) return;
            var blocked = (e.key === 's' || e.key === 'S' || e.key === 'p' || e.key === 'P');
            if ((e.ctrlKey || e.metaKey) && blocked) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
        }, true);

    })();
    </script>
</body>
</html>
