# Organisation Playbook - PHP/MySQL Version

This is the PHP/MySQL version of the Organisation Playbook website, converted from SvelteKit for deployment on Hostinger.

## Quick Start - Local Development

### Prerequisites
- PHP 7.4+ (with PDO MySQL extension)
- MySQL 5.7+ or MariaDB 10.2+ (can use MAMP's MySQL or standalone installation)

### Local Setup Steps

1. **Start MySQL:**
   - **Option A: Using MAMP** - Launch MAMP, start MySQL only (you don't need Apache)
   - **Option B: Standalone MySQL** - Start MySQL via Homebrew: `brew services start mysql` or use your system's MySQL service
   - Note: MAMP's default MySQL port is 8889 (standard MySQL is 3306)

2. **Set up the database:**

   **Using phpMyAdmin (if using MAMP):**
   - Open phpMyAdmin: http://localhost:8888/phpMyAdmin/
   - Default login: `root` / `root`
   - Create database: `org_playbook` (collation: `utf8mb4_unicode_ci`)
   - Import `sql/schema.sql`, then `sql/seed.sql`

   **Using MySQL command line:**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE org_playbook CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

   # Import schema and seed data
   mysql -u root -p org_playbook < sql/schema.sql
   mysql -u root -p org_playbook < sql/seed.sql
   ```

3. **Configure database connection:**
   ```bash
   cp .env.example .env
   ```
   Then edit `.env` with your database credentials:
   ```env
   DB_HOST=localhost
   DB_PORT=8889
   DB_NAME=org_playbook
   DB_USER=root
   DB_PASS=root
   DB_CHARSET=utf8mb4
   ```

   **Note:** Check MAMP's MySQL port in MAMP → Preferences → Ports. Common ports:
   - MAMP: 8889 (default)
   - MAMP PRO: 3306 (or check your settings)
   - Standard MySQL: 3306

4. **Start PHP built-in development server:**
   ```bash
   cd /path/to/org-playbook
   php -S localhost:8000 router.php
   ```

5. **Visit the site:**
   - Open: http://localhost:8000
   - Admin login: `admin` / `admin123`

**Note:** The `router.php` file handles URL rewriting (similar to .htaccess) so clean URLs work properly.

### CSS Setup
The site is already configured to use Tailwind CSS CDN (see `includes/header.php`). No additional CSS setup needed for local development!

## Setup Instructions (Full)

### 1. Database Setup

1. Create a MySQL database via your Hostinger control panel
2. Import the database schema:
   ```bash
   mysql -u your_username -p your_database_name < sql/schema.sql
   ```
3. Import the seed data:
   ```bash
   mysql -u your_username -p your_database_name < sql/seed.sql
   ```

### 2. Configuration

1. Copy the environment configuration template:
   ```bash
   cp .env.example .env
   ```

2. Edit `.env` with your database credentials:
   ```env
   DB_HOST=localhost
   DB_PORT=3306
   DB_NAME=your_database_name
   DB_USER=your_username
   DB_PASS=your_password
   DB_CHARSET=utf8mb4
   ```

### 3. CSS Compilation

The site uses Tailwind CSS. You have two options:

**Option A: Use Tailwind CDN (Quick Setup)**
- Replace the CSS link in `includes/header.php` with:
  ```html
  <script src="https://cdn.tailwindcss.com"></script>
  ```

**Option B: Compile Tailwind CSS (Recommended for Production)**
1. Install Tailwind CSS CLI:
   ```bash
   npm install -D tailwindcss
   npx tailwindcss init
   ```
2. Configure `tailwind.config.js`:
   ```js
   module.exports = {
     content: ["./**/*.php"],
     theme: {
       extend: {},
     },
     plugins: [],
   }
   ```
3. Compile CSS:
   ```bash
   npx tailwindcss -i ./assets/css/style.css -o ./assets/css/style.min.css --minify
   ```
4. Update `includes/header.php` to use `style.min.css`

### 4. File Permissions

Set proper file permissions:
- Files: 644
- Directories: 755
- `.env`: 600 (for security)

### 5. Admin Access

Default admin credentials (CHANGE THESE IN PRODUCTION!):
- Username: `admin`
- Password: `admin123`

To change the admin password, run this SQL query:
```sql
UPDATE admin_users SET password_hash = '$2y$10$...' WHERE username = 'admin';
```

Generate a new password hash using PHP:
```php
echo password_hash('your_new_password', PASSWORD_DEFAULT);
```

## File Structure

```
/
├── index.php                    # Home page
├── playbook/                    # Playbook pages
├── blogs/                       # Blog articles
├── systems/                     # Systems pages
│   ├── index.php               # Systems listing
│   ├── detail.php              # System detail page
│   └── tabs/                   # Tab content includes
├── roadmap/                     # Roadmap page
├── admin/                       # Admin interface
│   ├── index.php               # Admin login
│   ├── dashboard.php           # Admin dashboard
│   ├── systems.php             # Systems management
│   ├── categories.php          # Categories management
│   └── feedback.php            # Feedback viewer
├── api/                         # API endpoints
│   ├── systems.php             # Systems filtering API
│   └── feedback.php            # Feedback submission API
├── includes/                    # Shared includes
│   ├── header.php              # Page header
│   ├── footer.php              # Page footer
│   ├── navbar.php              # Navigation
│   ├── feedback-widget.php     # Feedback widget
│   └── db.php                  # Database connection
├── assets/                      # Static assets
│   ├── css/
│   └── js/
├── config/                      # Configuration files
├── sql/                         # Database files
└── .htaccess                    # URL rewriting rules
```

## Features

- ✅ Dynamic systems listing with filtering and search
- ✅ System detail pages with tabbed interface
- ✅ Feedback widget for user submissions
- ✅ Admin interface for content management
- ✅ Clean URLs with .htaccess routing
- ✅ MySQL database backend
- ✅ Responsive design with Tailwind CSS

## Deployment to Hostinger

1. **Upload files** – Upload all files to your Hostinger `/public_html` directory (or subdirectory)
2. **Ensure `.htaccess` is uploaded** – It may be hidden; enable "Show hidden files" in your FTP client
3. **Create database** – In Hostinger control panel, create a new MySQL database
4. **Run SQL setup** – In phpMyAdmin:
   - Select your new database
   - Go to the **SQL** tab
   - Open `sql/setup-hostinger.sql` from this repo, copy its contents, paste into phpMyAdmin, and click **Go**
   - This creates all tables and seeds the initial data
5. **Configure environment** – On the server, copy `.env.example` to `.env` and add your Hostinger database credentials:
   ```env
   DB_HOST=localhost
   DB_PORT=3306
   DB_NAME=your_hostinger_db_name
   DB_USER=your_hostinger_db_user
   DB_PASS=your_hostinger_db_password
   DB_CHARSET=utf8mb4
   ```
6. **Change default admin password** – Log in with `admin` / `admin123` and change it immediately

## Notes

- The site uses PDO for database access with prepared statements for security
- All user inputs are sanitized using `htmlspecialchars()`
- Passwords are hashed using PHP's `password_hash()` function
- Sessions are used for admin authentication
