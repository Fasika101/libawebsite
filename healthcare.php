<!DOCTYPE html>
<html lang="en">
<?php
$pageTitle = 'Healthcare Systems | Liba Digitals | Hospital & Clinic Management Solutions';
$pageDescription = 'Specialized healthcare management systems for hospitals, eye care clinics, and dental practices. Hospital Management, Eye Care, Dental Clinic systems & custom healthcare software. HIPAA compliant.';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'libadigitals.com';
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
$pageUrl = $basePath ? "{$protocol}://{$host}{$basePath}/healthcare.php" : "{$protocol}://{$host}/healthcare.php";
include 'include/header.php';
?>
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
                    <h1 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Healthcare Systems <span class="heading-wrapper">Portfolio</span></h1>
                    <nav class="breadcrumb">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="healthcare.php">Healthcare</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Intro Section -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center">
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Specialized Management Solutions for Healthcare Facilities</h2>
                    <p class="hc-intro-text">We develop customized healthcare management systems that streamline operations, improve patient care, and make running medical facilities easier. Our solutions are designed specifically for hospitals, eye care clinics, dental practices, and other healthcare providers.</p>
                    <a href="contact.php" class="btn btn-accent align-self-center">Get Started</a>
                </div>
            </div>
        </div>

        <!-- Dashboard Samples Section -->
        <div class="section bg-accent-color-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center mb-5">
                    <h4 class="accent-color">// System Preview</h4>
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Dashboard & Interface Samples</h2>
                    <p class="hc-intro-text" style="max-width: 600px; margin: 0 auto;">See how our healthcare systems look and feel. Clean, intuitive dashboards designed for efficiency.</p>
                </div>
                <div class="hc-dashboard-mockup">
                    <div class="hc-dashboard-header">
                        <div class="hc-dashboard-logo"><i class="fa-solid fa-hospital"></i> Hospital HMS</div>
                        <div class="hc-dashboard-nav">
                            <span class="hc-nav-item active">Dashboard</span>
                            <span class="hc-nav-item">Patients</span>
                            <span class="hc-nav-item">Appointments</span>
                            <span class="hc-nav-item">Reports</span>
                        </div>
                        <div class="hc-dashboard-user"><i class="fa-solid fa-user"></i> Admin</div>
                    </div>
                    <div class="hc-dashboard-body">
                        <div class="hc-dashboard-sidebar">
                            <div class="hc-sidebar-item"><i class="fa-solid fa-gauge-high"></i> Dashboard</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-user-injured"></i> Patients</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-calendar-check"></i> Appointments</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-pills"></i> Pharmacy</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-flask"></i> Laboratory</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-file-invoice-dollar"></i> Billing</div>
                            <div class="hc-sidebar-item"><i class="fa-solid fa-chart-line"></i> Reports</div>
                        </div>
                        <div class="hc-dashboard-content">
                            <div class="hc-dashboard-stats">
                                <div class="hc-stat-box"><div class="hc-stat-value">248</div><div class="hc-stat-label">Patients Today</div></div>
                                <div class="hc-stat-box"><div class="hc-stat-value">42</div><div class="hc-stat-label">Appointments</div></div>
                                <div class="hc-stat-box"><div class="hc-stat-value">18</div><div class="hc-stat-label">Beds Occupied</div></div>
                                <div class="hc-stat-box"><div class="hc-stat-value">94%</div><div class="hc-stat-label">Occupancy Rate</div></div>
                            </div>
                            <div class="hc-dashboard-grid">
                                <div class="hc-dashboard-card">
                                    <h4>Today's Appointments</h4>
                                    <div class="hc-appointment-list">
                                        <div class="hc-appt-row"><span class="hc-appt-time">09:00</span><span class="hc-appt-name">Alem M.</span><span class="hc-appt-type">Check-up</span></div>
                                        <div class="hc-appt-row"><span class="hc-appt-time">09:30</span><span class="hc-appt-name">Bereket T.</span><span class="hc-appt-type">Follow-up</span></div>
                                        <div class="hc-appt-row"><span class="hc-appt-time">10:00</span><span class="hc-appt-name">Dawit K.</span><span class="hc-appt-type">Consultation</span></div>
                                        <div class="hc-appt-row"><span class="hc-appt-time">10:30</span><span class="hc-appt-name">Helen G.</span><span class="hc-appt-type">Lab Results</span></div>
                                    </div>
                                </div>
                                <div class="hc-dashboard-card">
                                    <h4>Revenue Overview</h4>
                                    <div class="hc-chart-placeholder">
                                        <canvas id="hcDashboardChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hc-dashboard-caption">Sample Hospital Management System Dashboard</div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="section">
            <div class="hero-container">
                <div class="row row-cols-xl-4 row-cols-md-2 row-cols-1 g-4">
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter hc-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="4"></span>
                                <span class="counter-detail"></span>
                            </div>
                            <h6 class="font-1">System Types</h6>
                            <i class="fa-solid fa-hospital hc-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter hc-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="100"></span>
                                <span class="counter-detail">%</span>
                            </div>
                            <h6 class="font-1">HIPAA Compliant</h6>
                            <i class="fa-solid fa-shield-halved hc-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter hc-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="50"></span>
                                <span class="counter-detail">+</span>
                            </div>
                            <h6 class="font-1">Healthcare Clients</h6>
                            <i class="fa-solid fa-stethoscope hc-stat-icon"></i>
                        </div>
                    </div>
                    <div class="col animate-box animate__animated animated" data-animate="animate__fadeInUp">
                        <div class="card card-accent card-counter hc-stat-card">
                            <div class="d-flex flex-row align-items-center">
                                <span class="counter" data-target="24"></span>
                                <span class="counter-detail">/7</span>
                            </div>
                            <h6 class="font-1">Support Available</h6>
                            <i class="fa-solid fa-headset hc-stat-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Healthcare Management Solutions -->
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
                                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInLeft">Healthcare Management Solutions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="heading-wrapper-text">
                            <p>Customized systems for hospitals, eye care clinics, dental practices, and more.</p>
                        </div>
                    </div>

                    <!-- 1. Hospital Management System -->
                    <div class="hc-service-block">
                        <div class="hc-service-header">
                            <div class="hc-service-icon-wrap">
                                <i class="fa-solid fa-hospital"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">1. Hospital Management System</h3>
                                <h4>Comprehensive Hospital Operations Management</h4>
                            </div>
                        </div>
                        <p class="hc-overview">Our Hospital Management System is a complete solution designed to manage all aspects of hospital operations, from patient registration to discharge, billing, inventory, and staff management. It streamlines workflows and improves efficiency across all departments.</p>
                        <h5 class="hc-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-user-injured"></i><span>Patient Management & EHR</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-calendar-check"></i><span>Appointment Scheduling</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-file-invoice-dollar"></i><span>Billing & Insurance</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-pills"></i><span>Pharmacy Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-flask"></i><span>Laboratory Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-x-ray"></i><span>Radiology & Imaging</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-bed"></i><span>Ward & Bed Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-shield-halved"></i><span>Security & HIPAA Compliance</span></div></div>
                        </div>
                        <h5 class="hc-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Patient Care</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="95"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Operational Efficiency</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="92"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Administrative Reduction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="88"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Patient Satisfaction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="94"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 2. Eye Care Clinic Management System -->
                    <div class="hc-service-block">
                        <div class="hc-service-header">
                            <div class="hc-service-icon-wrap hc-icon-2">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">2. Eye Care Clinic Management System</h3>
                                <h4>Specialized Solutions for Ophthalmology Practices</h4>
                            </div>
                        </div>
                        <p class="hc-overview">Our Eye Care Management System is specifically designed for ophthalmology clinics and optometry practices. It handles patient eye examinations, vision testing, prescription management, and optical shop operations with specialized features for eye care professionals.</p>
                        <h5 class="hc-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-file-medical"></i><span>Patient Eye Records</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-glasses"></i><span>Vision Testing & Examination</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-prescription"></i><span>Prescription Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-store"></i><span>Optical Shop Integration</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-calendar-days"></i><span>Appointment Scheduling</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-camera"></i><span>Medical Imaging Integration</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-bell"></i><span>Reminder System</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-chart-pie"></i><span>Reporting & Analytics</span></div></div>
                        </div>
                        <h5 class="hc-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Workflow Streamlining</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="91"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Patient Retention</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="89"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Prescription Accuracy</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="96"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Optical Shop Operations</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="87"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 3. Dental Clinic Management System -->
                    <div class="hc-service-block">
                        <div class="hc-service-header">
                            <div class="hc-service-icon-wrap hc-icon-3">
                                <i class="fa-solid fa-tooth"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">3. Dental Clinic Management System</h3>
                                <h4>Complete Solutions for Dental Practices</h4>
                            </div>
                        </div>
                        <p class="hc-overview">Our Dental Clinic Management System is tailored for dental practices, orthodontists, and oral surgeons. It manages patient dental records, treatment plans, appointments, and dental procedures with specialized features for dental care providers.</p>
                        <h5 class="hc-subtitle">Key Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-teeth"></i><span>Dental Patient Records</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-clipboard-list"></i><span>Treatment Planning</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-calendar-check"></i><span>Appointment Scheduling</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-x-ray"></i><span>Dental Imaging Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-braces"></i><span>Orthodontic Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-boxes-stacked"></i><span>Inventory Management</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-rotate"></i><span>Recall & Reminder System</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-file-medical"></i><span>Clinical Notes & Documentation</span></div></div>
                        </div>
                        <h5 class="hc-subtitle">Business Benefits</h5>
                        <div class="row row-cols-md-2 row-cols-1 grid-spacer-3">
                            <div class="col"><div class="progress-container"><div class="progress-title">Practice Operations</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="93"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Treatment Tracking</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="90"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Paperwork Reduction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="85"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                            <div class="col"><div class="progress-container"><div class="progress-title">Patient Satisfaction</div><div class="progress-bar-container"><div class="progress-bar" data-progress-target="92"></div><div class="progress-message"><i class="fa-solid fa-message"></i><span>00%</span></div></div></div></div>
                        </div>
                    </div>

                    <!-- 4. Customized Healthcare Software -->
                    <div class="hc-service-block">
                        <div class="hc-service-header">
                            <div class="hc-service-icon-wrap hc-icon-4">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <div>
                                <h3 class="accent-color font-1">4. Customized Healthcare Software</h3>
                                <h4>Tailored Solutions for Your Healthcare Facility</h4>
                            </div>
                        </div>
                        <p class="hc-overview">We understand that every healthcare facility has unique requirements. Our custom healthcare software solutions are tailored to your specific needs, whether you run a specialized clinic, multi-specialty practice, or require integration with existing systems.</p>
                        <h5 class="hc-subtitle">Customization Capabilities</h5>
                        <div class="row row-cols-md-2 row-cols-1 g-3 mb-4">
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-puzzle-piece"></i><span>Specialty-Specific Modules</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-arrows-rotate"></i><span>Workflow Customization</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-plug"></i><span>Integration Capabilities</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-location-dot"></i><span>Multi-Location Support</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-mobile-screen"></i><span>Mobile Access</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-user-doctor"></i><span>Patient Portal</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-video"></i><span>Telemedicine Integration</span></div></div>
                            <div class="col"><div class="hc-feature-card"><i class="fa-solid fa-chart-line"></i><span>Custom Reporting</span></div></div>
                        </div>
                    </div>

                    <!-- Accordions for full features -->
                    <div class="accordion hc-accordion" id="hcFullFeatures">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcHospitalFeatures" aria-expanded="false">View All Hospital System Features</button>
                            </h2>
                            <div id="hcHospitalFeatures" class="accordion-collapse collapse" data-bs-parent="#hcFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list hc-feature-list">
                                        <li><strong> Patient Management</strong> — Registration, medical history, appointment scheduling, patient portal.</li>
                                        <li><strong>Electronic Health Records (EHR)</strong> — Digital records, lab results, imaging, prescriptions.</li>
                                        <li><strong>Billing & Insurance</strong> — Automated billing, insurance claims, payment tracking.</li>
                                        <li><strong>Pharmacy Management</strong> — Inventory, prescription tracking, drug interactions.</li>
                                        <li><strong>Laboratory Management</strong> — Lab ordering, result entry, digital reporting.</li>
                                        <li><strong>Radiology & Imaging</strong> — DICOM support, image storage and viewing.</li>
                                        <li><strong>Ward & Bed Management</strong> — Real-time bed availability, admission/discharge.</li>
                                        <li><strong>Staff & HR Management</strong> — Scheduling, attendance, payroll integration.</li>
                                        <li><strong>Inventory Management</strong> — Medical supplies, automated reordering.</li>
                                        <li><strong>Reporting & Analytics</strong> — Patient stats, revenue, occupancy metrics.</li>
                                        <li><strong>Security & Compliance</strong> — HIPAA-compliant, role-based access, audit trails.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcEyeFeatures" aria-expanded="false">View All Eye Care Features</button>
                            </h2>
                            <div id="hcEyeFeatures" class="accordion-collapse collapse" data-bs-parent="#hcFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list hc-feature-list">
                                        <li><strong>Patient Eye Records</strong> — Visual acuity, refraction, IOP, fundus results.</li>
                                        <li><strong>Vision Testing</strong> — Automated chart display, refraction management.</li>
                                        <li><strong>Prescription Management</strong> — Glasses and contact lens prescriptions.</li>
                                        <li><strong>Optical Shop Integration</strong> — Frame selection, lens ordering, inventory.</li>
                                        <li><strong>Contact Lens Management</strong> — Fitting records, trial lens tracking.</li>
                                        <li><strong>Medical Imaging</strong> — Retinal cameras, OCT scanners integration.</li>
                                        <li><strong>Insurance & Billing</strong> — Vision and medical insurance handling.</li>
                                        <li><strong>Reminder System</strong> — Exam reminders, prescription renewals.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcDentalFeatures" aria-expanded="false">View All Dental System Features</button>
                            </h2>
                            <div id="hcDentalFeatures" class="accordion-collapse collapse" data-bs-parent="#hcFullFeatures">
                                <div class="accordion-body">
                                    <ul class="check-list hc-feature-list">
                                        <li><strong>Dental Patient Records</strong> — Oral exams, X-rays, dental charts.</li>
                                        <li><strong>Treatment Planning</strong> — Procedures, cost estimates, timeline.</li>
                                        <li><strong>Dental Imaging</strong> — X-ray storage, DICOM, before/after comparison.</li>
                                        <li><strong>Procedure & Billing Codes</strong> — ADA codes, insurance claims.</li>
                                        <li><strong>Orthodontic Management</strong> — Bracket tracking, adjustment schedules.</li>
                                        <li><strong>Recall & Reminder System</strong> — Cleanings, check-ups, follow-ups.</li>
                                        <li><strong>Payment Plans</strong> — Installments, financing options.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Our Solutions -->
        <div class="section">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4 text-center mb-5">
                    <h4 class="accent-color">// Why Choose Us</h4>
                    <h2 class="animate-box animate__animated animated" data-animate="animate__fadeInUp">Why Healthcare Facilities Choose Our Solutions</h2>
                </div>
                <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-shield-halved"></i><h5>HIPAA Compliant</h5><p>All our systems are built with HIPAA compliance for patient data security and privacy.</p></div></div>
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-heart-pulse"></i><h5>Patient-Centered Design</h5><p>Systems prioritize patient care with easy record access, scheduling, and quality healthcare.</p></div></div>
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-gauge-high"></i><h5>Improved Efficiency</h5><p>Streamline operations, reduce paperwork, and automate routine tasks for more patient care time.</p></div></div>
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-mobile-screen"></i><h5>Mobile Access</h5><p>Access patient records and manage clinic operations from anywhere with mobile-friendly solutions.</p></div></div>
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-plug-circle-check"></i><h5>Easy Integration</h5><p>Seamlessly integrate with existing systems, medical devices, and third-party services.</p></div></div>
                    <div class="col"><div class="hc-why-card"><i class="fa-solid fa-headset"></i><h5>Dedicated Support</h5><p>Comprehensive training and ongoing support to ensure your team uses the system effectively.</p></div></div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="section join-us-banner">
            <div class="hero-container">
                <div class="join-us-content">
                    <h2 class="accent-color-3 animate-box animate__animated animated" data-animate="animate__fadeInUp">Transform Your Healthcare Facility</h2>
                    <p class="accent-color-3">Let's discuss how our healthcare management systems can streamline your operations, improve patient care, and make running your facility easier.</p>
                    <div class="d-flex flex-row flex-wrap align-self-center justify-content-center gspace-2">
                        <a href="contact.php" class="btn btn-accent">Schedule a Consultation</a>
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
    <script src="js/video_embedded.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('hcDashboardChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    datasets: [{
                        label: 'Revenue',
                        data: [4200, 5100, 4800, 5900, 6200, 4500],
                        borderColor: '#008A16',
                        backgroundColor: 'rgba(0, 138, 22, 0.12)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }
    });
    </script>
</body>
</html>
