# Local Development Setup Guide

This guide shows you how to run the Organisation Playbook locally using PHP's built-in server.

## Prerequisites

- **PHP 7.4+** with PDO MySQL extension
- **MySQL 5.7+** or MariaDB 10.2+ (you can use MAMP's MySQL or standalone)

## Quick Setup

### 1. Start MySQL

**Option A: Using MAMP (Easiest)**
1. Launch MAMP
2. Click "Start Servers" (you only need MySQL, but starting both won't hurt)
3. Default MySQL port: **8889**

**Option B: Standalone MySQL**
- Start MySQL via Homebrew: `brew services start mysql`
- Or use your system's MySQL service
- Default port: **3306**

### 2. Create and Setup Database

**Using phpMyAdmin (if using MAMP):**
1. Open http://localhost:8888/phpMyAdmin/
2. Login: `root` / `root` (MAMP default)
3. Create database: `org_playbook` (collation: `utf8mb4_unicode_ci`)
4. Import `sql/schema.sql`
5. Import `sql/seed.sql`

**Using MySQL Command Line:**
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE org_playbook CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Import schema and seed data
mysql -u root -p org_playbook < sql/schema.sql
mysql -u root -p org_playbook < sql/seed.sql
```

### 3. Configure Environment Variables

1. Copy the environment template:
   ```bash
   cp .env.example .env
   ```

2. Edit `.env` with your database settings:
   ```env
   DB_HOST=localhost
   DB_PORT=8889        # Use 8889 for MAMP, 3306 for standard MySQL
   DB_NAME=org_playbook
   DB_USER=root
   DB_PASS=root        # Change if your MySQL has a different password
   DB_CHARSET=utf8mb4
   ```

### 4. Start PHP Development Server

From the project root directory:
```bash
php -S localhost:8000 router.php
```

The `router.php` file handles URL rewriting (like .htaccess) so clean URLs work properly.

### 5. Access the Site

- **Main site:** http://localhost:8000
- **Admin login:** `admin` / `admin123`

## Troubleshooting

**Can't connect to database?**
- Make sure MySQL is running
- Check the port in `.env` matches your MySQL port (8889 for MAMP, 3306 for standard MySQL)
- Verify database name, username, and password in `.env`
- Test connection: `mysql -u root -p -h localhost -P 8889` (adjust port as needed)

**Page not found errors?**
- Make sure you're running: `php -S localhost:8000 router.php` (not just `php -S localhost:8000`)
- The `router.php` file is required for proper URL routing

**Port already in use?**
- Use a different port: `php -S localhost:8080 router.php`
- Or stop whatever is using port 8000

**CSS not loading?**
- The site uses Tailwind CDN (already configured)
- Make sure you have an internet connection

## Stopping the Server

Press `Ctrl+C` in the terminal where the server is running.

## Development Tips

- The server will automatically reload when you change PHP files
- Check the terminal for any PHP errors or warnings
- Database changes persist between server restarts
- Session data is stored server-side (will persist across page refreshes)
