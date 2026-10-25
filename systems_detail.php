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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Brand <span class="heading-wrapper">Partnership</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="services.php">Services</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="service_detail.php">Brand Partnership</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Service Detail Section -->
        <div class="section">
            <div class="hero-container">
                <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                    <div class="col col-md-8">
                        <div class="d-flex flex-column gspace-3">
                            <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                                <div class="col">
                                    <div class="image-container">
                                        <img src="./image/colleagues-greeting-at-a-presentation-in-the-offic-2024-09-21-18-01-05-utc.jpg" alt="Service Image">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column gspace-3">
                                        <h3>Overview</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            In imperdiet turpis vitae quis magna dignissim consequat. 
                                            Sed a enim sed purus suscipit cursus in. Integer enim justo, venenatis ut tempus vel, facilisis ut ex. 
                                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
                                            Etiam velit est, vulputate non egestas quis, commodo id turpis. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Fusce luctus sollicitudin est eget eleifend. Donec risus ante, eleifend non tortor nec, porttitor cursus risus. Vestibulum blandit mi et velit sodales fringilla. Phasellus urna velit, aliquam mattis porta in, pretium ut nisl. Cras fringilla facilisis orci, non rhoncus libero sodales non. Fusce viverra risus vitae ornare scelerisque. Praesent volutpat, augue at iaculis consequat, massa mauris suscipit leo, et sodales turpis magna eget magna. 
                            </p>
                            <p>
                                Morbi volutpat lacus a elementum vestibulum. Nullam euismod augue diam, id laoreet nulla imperdiet ut. Cras vel massa eu leo varius rhoncus dignissim feugiat elit. Nulla ante erat, ultricies quis condimentum a, scelerisque id mi. Ut eu mauris justo. Sed suscipit, quam quis malesuada lacinia, mauris mi rutrum lacus, sit amet viverra lorem felis et arcu. Duis pretium, urna a aliquam blandit, diam magna efficitur metus, in consequat elit lectus vel diam.
                            </p>
                            <h3>Key Benefits</h3>
                            <p>
                                Proin bibendum auctor arcu vestibulum pretium. Sed sed tellus rhoncus, lacinia nibh eget, egestas ex. Nulla facilisi. Vestibulum aliquet convallis massa, laoreet pharetra mauris consectetur vel. Mauris vel efficitur erat. Nam fringilla lorem a ipsum condimentum pretium. Vestibulum at mauris velit.
                            </p>
                            <ul class="chevron-list">
                                <li>Sed id augue lobortis, blandit mi laoreet, faucibus mi.</li>
                                <li>Etiam porttitor urna vitae bibendum molestie.</li>
                                <li>Ut iaculis diam hendrerit sem posuere tempor.</li>
                                <li>Vestibulum blandit metus sed pellentesque feugiat.</li>
                                <li>Quisque vehicula eros a tristique faucibus.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="d-flex flex-column gspace-3">
                            <div class="other-service-banner">
                                <ul class="other-service-list">
                                    <li><a href="./service_detail.html">Talent Management</a></li>
                                    <li><a href="./service_detail.html">Influencer Marketing</a></li>
                                    <li><a href="./service_detail.html">Content Strategy</a></li>
                                </ul>
                            </div>
                            <div class="contactus-cta">
                                <h3 class="accent-color-3">Let's Create Impact Together!</h3>
                                <p class="accent-color-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                <div>
                                    <a href="./contact.html" class="btn btn-accent">Contact Us</a>
                                </div>
                            </div>
                            <div class="social-media-cta">
                                <h3 class="accent-color-3">Find Us On</h3>
                                <div class="social-container justify-content-start">
                                    <a href="https://www.facebook.com" class="social-icon">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.instagram.com" class="social-icon">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="https://www.linkedin.com" class="social-icon">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://www.youtube.com" class="social-icon">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
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

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/swiper-script.js"></script>
    <script src="js/submit-form.js"></script>
    <script src="js/vendor/isotope.pkgd.min.js"></script>
    <script src="js/vendor/fslightbox.js"></script>
    <script src="js/video_embedded.js"></script>
</body>
</html>