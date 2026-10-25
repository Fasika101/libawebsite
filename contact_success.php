<!DOCTYPE html>
<html lang="en">

<?php include 'include/header.php'; ?>
<style>
    .accent-color-cs {
        color: #202720 !important;
    }
</style>
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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Message <span class="heading-wrapper">Sent</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="contact.php">Contact Us</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <span>Success</span>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Success Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 400px;">
                    <div class="contact-success-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <h2 class="accent-color-cs mb-3" style="font-family: var(--font-1);">Thank You for Reaching Out!</h2>
                    <p class="accent-color-cs mb-4" style="font-family: var(--font-2); max-width: 520px; font-size: 1.1rem; line-height: 1.6;">
                        Your message has been received successfully. We will get back to you shortly.
                    </p>
                        <p class="accent-color-cs mb-4" style="font-family: var(--font-2); max-width: 520px; font-size: 0.95rem; opacity: 0.9;">
                        Our team typically responds within 24–48 hours. We appreciate your patience.
                    </p>
                    <div class="d-flex flex-row flex-wrap justify-content-center gspace-2">
                        <a href="index.php" class="btn btn-accent">Back to Home</a>
                        <a href="contact.php" class="btn btn-accent-outline">Send Another Message</a>
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
