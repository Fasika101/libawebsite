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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Contact <span class="heading-wrapper">Us</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="contact.php">Contact Us</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="d-flex flex-column flex-md-row gspace-md-0 gspace-2">
                        <div class="heading-wrapper-title">
                            <div class="row row-cols-xl-2 row-cols-1 gx-0 gy-3">
                                <div class="col col-xl-4">
                                    <h4 class="accent-color">// Get In Touch</h4>
                                </div>
                                <div class="col col-xl-8 overflow-hidden">
                                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Let's Talk, Reach Out to Us Today!</h2>
                                </div>
                            </div>
                        </div>
                        <div class="heading-wrapper-text">
                            <p>Smart Digital Infrastructure for Modern Brands.</p>
                        </div>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-xl-5 grid-spacer-3">
                        <div class="col">
                            <div class="d-flex flex-column gspace-3">
                                <iframe loading="lazy" class="maps overflow-hidden"
                                    src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=14&amp;output=embed&amp;iwloc=near"
                                    title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom">
                                </iframe>
                                <div class="social-media-cta">
                                    <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                                        <div class="col">
                                            <div class="d-flex flex-row align-items-center gspace-2">
                                                <div>     
                                                    <div class="talent-social-icon">
                                                        <i class="fa-solid fa-phone-volume"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h3 class="py-2 accent-color-3">Call Us</h3>
                                                    <p class="accent-color-3"><?php echo htmlspecialchars(site_setting('phone_primary')); ?></p>
                                                    <p class="accent-color-3"><?php echo htmlspecialchars(site_setting('phone_secondary')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex flex-row align-items-center gspace-2">
                                                <div>     
                                                    <div class="talent-social-icon">
                                                        <i class="fa-solid fa-envelope-open-text"></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h3 class="py-2 accent-color-3">Mail Us</h3>
                                                    <p class="accent-color-3"><?php echo htmlspecialchars(site_setting('email_primary')); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-form" style="position: relative;">
                                <div id="contactFormLoading" class="contact-form-loading hidden">
                                    <div class="contact-form-loading-content">
                                        <div class="contact-form-loading-spinner"></div>
                                        <p class="contact-form-loading-text">Sending your message...</p>
                                    </div>
                                </div>
                                <form id="contactForm" action="admin/process_contact.php" class="form" novalidate>
                                    <div id="success-message" class="alert success hidden">
                                        <span class="check-icon"><i class="fa-solid fa-2xl fa-check"></i></span>
                                        <p>Thank you! Form submitted successfully.</p>
                                    </div>
                                    
                                    <div id="error-message" class="alert error hidden">
                                        <span class="cross-icon"><i class="fa-solid fa-2xl fa-xmark"></i></span>
                                        <p>Oops! Form submission failed. Please try again.</p>
                                    </div>

                                    <div class="row row-cols-md-2 row-cols-1">
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" placeholder="Name" required>
                                                <p class="error-text hidden">Name is required</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" placeholder="Email" required>
                                                <p class="error-text hidden">Email is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-cols-md-2 row-cols-1">
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <label for="phone">Telephone</label>
                                                <input type="tel" name="phone" id="phone" placeholder="Phone" required>
                                                <p class="error-text hidden">Telephone is required</p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-grid gap-2">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" id="subject" placeholder="Subject" required>
                                                <p class="error-text hidden">Subject is required</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <label for="message">Message/Question</label>
                                        <textarea rows="4" name="message" id="message" placeholder="Ask your question here" required></textarea>
                                        <p class="error-text hidden">Message is required</p>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-accent">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Join Us Section -->
        <div class="section join-us-banner">
            <div class="hero-container">
                <div class="join-us-content">
                    <h2 class="accent-color-3 animate-box animate__animated animated" data-animate="animate__fadeInUp">Let's create something amazing together. Reach out now!</h2>
                    <p class="accent-color-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Condimentum nunc praesent bibendum class fringilla mollis consectetur pharetra. Ex lacus justo fames sodales, neque magna finibus arcu iaculis. Torquent habitant vitae libero mi litora.</p>
                    <div class="d-flex flex-row flex-wrap align-self-center justify-content-center gspace-2">
                        <a href="#" class="btn btn-accent">Join Our Team</a>
                        <div class="link-wrapper">
                            <a href="#">Collaborate with Us</a>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-5">
                    <div class="d-flex flex-column flex-md-row gspace-md-0 gspace-2">
                        <div class="heading-wrapper-title">
                            <div class="row row-cols-xl-2 row-cols-1 gx-0 gy-3">
                                <div class="col col-xl-4">
                                    <h4 class="accent-color">// FAQs</h4>
                                </div>
                                <div class="col col-xl-8 overflow-hidden">
                                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Common Questions About Our Digital Solutions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="heading-wrapper-text">
                            <p>Find answers to frequently asked questions about our services, process, and solutions.</p>
                        </div>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-4">
                        <div class="col col-xl-9">
                            <div class="accordion" id="faqAccordion1-lg">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq1-lg" aria-expanded="true" aria-controls="faq1-lg">
                                            What services does Liba Digitals offer?
                                        </button>
                                    </h2>
                                    <div id="faq1-lg" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion1-lg">
                                        <div class="accordion-body">
                                            <span>
                                                We offer a comprehensive suite of digital solutions including custom management systems, stock & inventory management, mobile application development, website development, social media management, and digital marketing services.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq2-lg" aria-expanded="false"
                                            aria-controls="faq2-lg">
                                            How long does a typical project take?
                                        </button>
                                    </h2>
                                    <div id="faq2-lg" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1-lg">
                                        <div class="accordion-body">
                                            <span>
                                                Project timelines vary based on scope and complexity. A simple website may take 2-4 weeks, while a custom management system could take 2-6 months. We provide detailed timelines during the planning phase.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq3-lg" aria-expanded="false"
                                            aria-controls="faq3-lg">
                                            Do you provide ongoing support after project delivery?
                                        </button>
                                    </h2>
                                    <div id="faq3-lg" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1-lg">
                                        <div class="accordion-body">
                                            <span>
                                                Yes, we provide comprehensive post-launch support including regular updates, bug fixes, feature enhancements, security patches, and performance optimization. Our relationship doesn't end at delivery.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq4-lg" aria-expanded="false"
                                            aria-controls="faq4-lg">
                                            Can you develop solutions for specific industries like healthcare?
                                        </button>
                                    </h2>
                                    <div id="faq4-lg" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1-lg">
                                        <div class="accordion-body">
                                            <span>
                                                Absolutely. We specialize in healthcare management systems for hospitals, eye care clinics, and dental practices. We also serve retail, education, logistics, and many other industries with tailored solutions.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq5-lg" aria-expanded="false"
                                            aria-controls="faq5-lg">
                                            How do I get started with Liba Digitals?
                                        </button>
                                    </h2>
                                    <div id="faq5-lg" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1-lg">
                                        <div class="accordion-body">
                                            <span>
                                                Simply reach out through our contact page or request a free consultation. We'll schedule an initial discovery meeting to understand your needs, then prepare a detailed project plan with timeline and investment details.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3">
                            <div class="card faq-cta-banner">
                                <video class="faq-cta-banner-video" autoplay loop muted playsinline preload="auto">
                                    <source src="image/home/contact.mp4" type="video/mp4">
                                </video>
                                <div class="spacer"></div> 
                                <h3 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Need more info? Reach out now!</h3>
                                <p class="accent-color-3">
                                    Didn't find what you were looking for? Reach out to us — we're happy to help!
                                </p>
                                <div>
                                    <a href="contact.php" class="btn btn-accent">Contact Us</a>
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