-- Liba Web Database Schema

-- Create Database
CREATE DATABASE IF NOT EXISTS libaweb_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE libaweb_db;

-- Admin Users Table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    status ENUM('active', 'inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Contact Form Submissions Table
CREATE TABLE IF NOT EXISTS contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied', 'archived') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    admin_notes TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Systems Content Table
CREATE TABLE IF NOT EXISTS systems_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE NOT NULL,
    description TEXT,
    content TEXT,
    icon VARCHAR(50),
    image VARCHAR(255) NULL,
    order_index INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES admin_users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add image column if table already exists
ALTER TABLE systems_content ADD COLUMN IF NOT EXISTS image VARCHAR(255) NULL AFTER icon;

-- Insert Default Admin User (password: admin123)
-- Password hash for 'admin123'
INSERT INTO admin_users (username, email, password, full_name, status) 
VALUES ('admin', 'admin@libadigitals.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'active')
ON DUPLICATE KEY UPDATE username=username;

-- Insert Default Systems Content
INSERT INTO systems_content (title, slug, description, content, icon, order_index, status) VALUES
('Custom Management Systems', 'custom-management-systems', 
'Specialized solutions for unique business needs. We develop custom management systems including project management, document management, asset management, quality management, facility management, and learning management systems with workflow automation and custom reporting & analytics.',
'<h4>Key Features & Capabilities</h4>
<ul>
<li><strong>Project Management Systems</strong> - Comprehensive project planning, tracking, and management with advanced task scheduling, resource allocation, Gantt charts, milestone tracking, and team collaboration tools.</li>
<li><strong>Document Management Systems</strong> - Centralized document storage with version control, collaborative editing, access permissions, document search, and automated workflow approvals.</li>
<li><strong>Asset Management Systems</strong> - Complete asset lifecycle management including tracking, maintenance schedules, depreciation calculations, asset allocation, and compliance reporting.</li>
<li><strong>Quality Management Systems</strong> - ISO compliance tracking, quality control processes, audit management, non-conformance tracking, corrective action management, and quality reporting.</li>
<li><strong>Facility Management Systems</strong> - Building maintenance scheduling, space planning, resource scheduling, work order management, and vendor coordination.</li>
<li><strong>Learning Management Systems</strong> - Employee training programs, course management, progress tracking, certification management, and performance assessments.</li>
<li><strong>Workflow Automation</strong> - Automated business processes to reduce manual work, eliminate errors, and improve efficiency with customizable workflow rules and triggers.</li>
<li><strong>Custom Reporting & Analytics</strong> - Tailored reports and dashboards for performance monitoring, with real-time data visualization and export capabilities.</li>
</ul>
<h4>Business Benefits</h4>
<ul>
<li>Improved operational efficiency through automation</li>
<li>Better resource utilization and allocation</li>
<li>Enhanced compliance and regulatory adherence</li>
<li>Reduced errors and improved accuracy</li>
<li>Streamlined workflows and processes</li>
<li>Centralized data management</li>
<li>Improved decision-making through real-time insights</li>
</ul>',
'fa-gear', 1, 'active'),

('Stock & Inventory Management', 'stock-inventory-management',
'Advanced inventory control for optimal operations. Real-time tracking, barcode & RFID integration, multi-location management, automated reordering, advanced stock valuation, batch & serial number tracking, and comprehensive reporting.',
'<h4>Key Features & Capabilities</h4>
<ul>
<li><strong>Real-Time Inventory Tracking</strong> - Live stock levels across multiple warehouses and locations with instant updates on all transactions and movements.</li>
<li><strong>Barcode & RFID Integration</strong> - Automated scanning technology for accurate inventory counts, faster operations, and reduced human error in stock management.</li>
<li><strong>Multi-Location Management</strong> - Centralized control of stock across multiple warehouses, stores, distribution centers, and retail outlets.</li>
<li><strong>Automated Reordering System</strong> - Smart reorder points with automatic purchase order generation based on sales trends, lead times, and minimum stock levels.</li>
<li><strong>Advanced Stock Valuation</strong> - Support for FIFO, LIFO, and weighted average costing methods with accurate cost calculations and profit margin analysis.</li>
<li><strong>Batch & Serial Number Tracking</strong> - Complete traceability of individual items and batches for quality control, recalls, and warranty management.</li>
<li><strong>Complete Audit Trail</strong> - Detailed history of all stock movements, transactions, and adjustments with user tracking and timestamp records.</li>
<li><strong>System Integration</strong> - Seamless integration with POS systems, e-commerce platforms, accounting software, and supplier systems.</li>
<li><strong>Automated Alerts & Notifications</strong> - Real-time alerts for low stock levels, expiring items, slow-moving inventory, and critical stock situations.</li>
<li><strong>Comprehensive Reporting</strong> - Detailed reports on stock levels, turnover rates, valuation, aging analysis, and inventory performance metrics.</li>
</ul>
<h4>Business Benefits</h4>
<ul>
<li>Eliminated stockouts and reduced overstocking</li>
<li>Improved cash flow through optimized inventory levels</li>
<li>Minimized losses from expired or obsolete stock</li>
<li>Better supplier relationships through accurate forecasting</li>
<li>Enhanced customer satisfaction with product availability</li>
<li>Reduced carrying costs and storage expenses</li>
<li>Improved accuracy in financial reporting</li>
</ul>',
'fa-boxes', 2, 'active'),

('Mobile Application Development', 'mobile-application-development',
'Native & cross-platform mobile solutions for iOS and Android. We create powerful, user-friendly mobile applications including enterprise apps, e-commerce apps, social & community apps, and IoT integration with API & backend integration.',
'<h4>Key Features & Capabilities</h4>
<ul>
<li><strong>Native Application Development</strong> - High-performance iOS (Swift) and Android (Kotlin/Java) applications optimized for each platform\'s unique capabilities and user expectations.</li>
<li><strong>Cross-Platform Development</strong> - React Native and Flutter applications for faster deployment across multiple platforms while maintaining native-like performance.</li>
<li><strong>UI/UX Design Excellence</strong> - Intuitive and engaging interfaces designed with user experience principles, ensuring high user satisfaction and retention rates.</li>
<li><strong>Enterprise Mobile Applications</strong> - Custom solutions for internal business operations, employee productivity tools, field service management, and workforce collaboration.</li>
<li><strong>E-Commerce Mobile Apps</strong> - Feature-rich shopping applications with secure payment integration, product catalogs, wishlists, order tracking, and customer accounts.</li>
<li><strong>Social & Community Apps</strong> - Community-driven platforms with real-time messaging, content sharing, user profiles, and engagement features.</li>
<li><strong>IoT & Smart Device Integration</strong> - Mobile apps connected to IoT devices, smart systems, wearables, and connected hardware for enhanced functionality.</li>
<li><strong>API & Backend Integration</strong> - Seamless connection with existing backend systems, third-party services, cloud platforms, and enterprise databases.</li>
<li><strong>Push Notifications & Engagement</strong> - Targeted push notifications, in-app messaging, and engagement features to keep users active and informed.</li>
<li><strong>App Store Optimization</strong> - Expert guidance for app store submission, optimization, keyword research, and ASO strategies to maximize visibility.</li>
<li><strong>Ongoing Maintenance & Support</strong> - Regular updates, bug fixes, feature enhancements, security patches, and performance optimization services.</li>
</ul>
<h4>Business Benefits</h4>
<ul>
<li>Increased customer engagement and brand loyalty</li>
<li>Enhanced brand visibility and market presence</li>
<li>New revenue streams through mobile commerce</li>
<li>Improved customer service and support</li>
<li>Competitive advantage in the marketplace</li>
<li>Better data collection and customer insights</li>
<li>Streamlined internal operations and productivity</li>
</ul>',
'fa-mobile-alt', 3, 'active'),

('Website Development & Design', 'website-development-design',
'Modern, responsive web solutions. We design and develop stunning websites including responsive design, e-commerce platforms, content management systems, custom web applications, progressive web apps, and SEO optimization.',
'<h4>Key Features & Capabilities</h4>
<ul>
<li><strong>Responsive Web Design</strong> - Mobile-first approach ensuring perfect display and functionality on desktops, tablets, and smartphones with adaptive layouts.</li>
<li><strong>E-Commerce Platforms</strong> - Full-featured online stores with secure payment gateways, shopping carts, inventory management, order processing, and customer accounts.</li>
<li><strong>Content Management Systems</strong> - Easy-to-use CMS platforms (WordPress, Drupal, custom) for content updates, page management, and site administration.</li>
<li><strong>Custom Web Applications</strong> - Tailored web solutions for specific business needs including portals, dashboards, booking systems, and enterprise applications.</li>
<li><strong>Progressive Web Apps (PWA)</strong> - App-like web experiences with offline capabilities, push notifications, and installation features for enhanced user engagement.</li>
<li><strong>SEO Optimization</strong> - Built-in SEO best practices including meta tags, structured data, sitemaps, and optimization for better search engine rankings.</li>
<li><strong>Performance Optimization</strong> - Fast loading times, optimized images, code minification, CDN integration, and caching strategies for optimal user experience.</li>
<li><strong>Security Features</strong> - SSL certificates, secure payment processing, data encryption, regular security audits, and protection against common vulnerabilities.</li>
<li><strong>Third-Party Integrations</strong> - Seamless integration with CRM systems, analytics tools, marketing platforms, payment processors, and other business tools.</li>
<li><strong>Website Maintenance & Support</strong> - Regular updates, security patches, content management, backup services, and technical support for ongoing operations.</li>
<li><strong>Hosting & Domain Services</strong> - Reliable hosting solutions, domain registration, email hosting, and DNS management services.</li>
</ul>
<h4>Business Benefits</h4>
<ul>
<li>Enhanced online presence and brand credibility</li>
<li>Increased customer reach and market expansion</li>
<li>Improved conversion rates and lead generation</li>
<li>24/7 business accessibility and availability</li>
<li>Better customer engagement and interaction</li>
<li>Cost-effective marketing and sales channel</li>
<li>Competitive advantage in the digital marketplace</li>
</ul>',
'fa-globe', 4, 'active')
ON DUPLICATE KEY UPDATE title=title;
