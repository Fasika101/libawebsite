<?php require_once __DIR__ . '/site.php'; ?>
<div class="section-footer bg-footer">
    <div class="hero-container">
        <div class="d-flex flex-column gspace-3">
            <div class="d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center gspace-3">
                <div class="logo-container footer-logo">
                    <img src="<?php echo htmlspecialchars(site_setting('main_footer_logo')); ?>" alt="Liba Digitals Logo" class="img-fluid">
                </div>
                <div class="d-flex flex-row flex-wrap gspace-1 align-items-center justify-content-center">
                    <a href="index.php" class="quick-link">Home</a>
                    <a href="about.php" class="quick-link">About Us</a>
                    <a href="systems.php" class="quick-link">Our Systems</a>
                    <a href="portfolio.php" class="quick-link">Portfolio</a>
                    <a href="healthcare.php" class="quick-link">Healthcare</a>
                    <a href="blog.php" class="quick-link">Blog</a>
                    <a href="contact.php" class="quick-link">Contact Us</a>
                </div>
            </div>
            <div class="underline-2"></div>
            <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 grid-spacer-2">
                <div class="col col-xl-3 col-md-6">
                    <div class="d-flex flex-column gspace-2">
                        <h3 class="accent-color-3">About Us</h3>
                        <p class="accent-color-3">
                            Liba Digitals is a forward-thinking digital solutions company dedicated to transforming business operations and driving sustainable growth.
                        </p>
                        <div class="social-container-footer">
                            <a href="https://www.facebook.com/" class="social-icon">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/" class="social-icon">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://www.linkedin.com/" class="social-icon">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="https://www.youtube.com/" class="social-icon">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-md-6">
                    <div class="d-flex flex-column gspace-2">
                        <h3 class="accent-color-3">Our Services</h3>
                        <ul class="chevron-list">
                            <li><a href="systems.php">Custom Management Systems</a></li>
                            <li><a href="healthcare.php">Healthcare Systems</a></li>
                            <li><a href="systems.php">Mobile App Development</a></li>
                            <li><a href="digital-marketing.php">Digital Marketing</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col col-xl-3 col-md-6">
                    <div class="d-flex flex-column gspace-2">
                        <h3 class="accent-color-3">Resources</h3>
                        <ul class="chevron-list">
                            <li><a href="https://totatype.libadigitals.com/">Tota Typography</a></li>
                            <li><a href="https://libadigitals.com/beta-giyorgis.html">Lalibela (Beta Giyorgis)</a></li>
                            <li><a href="https://libadigitals.com/flower-of-life.html">Flower of Life</a></li>
                            <!-- <li><a href="systems.php">Digital Marketing</a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="col col-xl-3 col-md-6">
                    <div class="d-flex flex-column gspace-2">
                        <h3 class="accent-color-3">Contact Us</h3>
                        <ul class="footer-list">
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <span><?php echo htmlspecialchars(site_setting('phone_primary')); ?></span>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <span><?php echo htmlspecialchars(site_setting('email_primary')); ?></span>
                            </li>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span><?php echo htmlspecialchars(site_setting('address')); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col col-xl-3 col-md-6">
                    <div class="d-flex flex-column gspace-2">
                        <h3 class="accent-color-3">Newsletter</h3>
                        <p class="accent-color-3">
                            Subscribe to our newsletter for the latest updates and digital insights.
                        </p>
                        <div class="d-flex flex-column gspace-1">
                            <div id="newsletter-success" class="alert success hidden">
                                <span class="check-icon"><i class="fa-solid fa-2xl fa-check"></i></span>
                                <p class="text-center">Thank you! Form submitted successfully.</p>
                            </div>
                        
                            <div id="newsletter-error" class="alert error hidden">
                                <span class="cross-icon"><i class="fa-solid fa-2xl fa-xmark"></i></span>
                                <p class="text-center">Oops! Form submission failed. Please try again.</p>
                            </div>

                            <form action="https://influencely.foxcreation.net/php/newsletter_process.php" method="POST" id="newsletterForm" class="needs-validation" novalidate>
                                <div class="d-flex w-100 gspace-1">
                                    <div class="d-flex w-100 flex-column gspace-3">
                                        <input type="email" name="newsletter-email" id="newsletter-email" placeholder="Email" required>
                                        <p class="error-text hidden">Email is required</p>
                                    </div>
                                    <button class="btn btn-accent" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="underline-2"></div>
            <div class="text-center">
                <p class="accent-color-3">
                    Liba Digitals © 2026 All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</div>
