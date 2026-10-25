# Admin Dashboard - Liba Digitals

## Setup Instructions

### 1. Database Setup
1. Open phpMyAdmin or MySQL command line
2. Import the database schema:
   ```sql
   SOURCE admin/database.sql;
   ```
   Or manually run the SQL file in phpMyAdmin

### 2. Database Configuration
Edit `admin/config.php` and update database credentials if needed:
- DB_HOST: localhost (default)
- DB_USER: root (default)
- DB_PASS: '' (empty by default for WAMP)
- DB_NAME: libaweb_db

### 3. Default Login Credentials
- **Username:** admin
- **Password:** admin123

**Important:** Change the default password after first login!

### 4. Access Admin Panel
Navigate to: `http://localhost/libaweb/admin/login.php`

## Features

### Dashboard
- Overview statistics
- Recent contact submissions
- Quick access to all sections

### Contact Form Management
- View all contact form submissions
- Filter by status (New, Read, Replied, Archived)
- View detailed contact information
- Update status and add admin notes
- Mark contacts as read/replied

### Systems Content Management
- Add, edit, and delete system content
- Manage system descriptions and full content
- Set display order
- Activate/deactivate systems
- Default systems are pre-loaded from the systems page

## File Structure

```
admin/
├── config.php              # Database configuration and helper functions
├── database.sql            # Database schema and initial data
├── login.php               # Admin login page
├── logout.php              # Logout handler
├── dashboard.php           # Main dashboard
├── contact.php             # Contact form management
├── systems.php             # Systems content management
├── process_contact.php     # Contact form submission handler
├── includes/
│   ├── header.php          # Admin header and sidebar
│   └── footer.php          # Admin footer
└── README.md               # This file
```

## Security Notes

1. Change default admin password immediately
2. Keep database credentials secure
3. Admin panel should be protected with .htaccess in production
4. Use HTTPS in production environment

## Responsive Design

The admin panel uses AdminLTE 3.2 which is fully responsive and works on:
- Desktop computers
- Tablets
- Mobile phones

## Support

For issues or questions, contact the development team.
