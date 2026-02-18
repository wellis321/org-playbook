# Quick Setup Guide for MAMP

This guide uses MAMP's phpMyAdmin for database setup, but PHP's built-in server for running the app.

> **Note:** For a simpler setup using only PHP's built-in server, see [SETUP-LOCAL.md](SETUP-LOCAL.md)

Follow these steps to get the app running locally:

## Step 1: Start MAMP
1. Open MAMP application
2. Click "Start Servers" (Apache and MySQL should turn green)

## Step 2: Create Database in phpMyAdmin
1. Open phpMyAdmin: http://localhost:8888/phpMyAdmin/
   - Username: `root`
   - Password: `root` (MAMP default)
2. Click "New" in the left sidebar
3. Database name: `org_playbook`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"

## Step 3: Import Database Files
1. Select `org_playbook` database from left sidebar
2. Click "Import" tab
3. Click "Choose File"
4. Select `sql/schema.sql` from this project
5. Click "Go" at the bottom
6. Repeat for `sql/seed.sql`:
   - Click "Import" tab again
   - Choose `sql/seed.sql`
   - Click "Go"

## Step 4: Configure Database Connection
1. Copy the environment template:
   ```bash
   cp .env.example .env
   ```
2. Edit `.env` with your MAMP database settings:
   ```env
   DB_HOST=localhost
   DB_PORT=8889
   DB_NAME=org_playbook
   DB_USER=root
   DB_PASS=root
   DB_CHARSET=utf8mb4
   ```
   **Note:** Check MAMP → Preferences → Ports if your MySQL port is different from 8889

## Step 5: Start PHP Development Server

From the project root directory:
```bash
php -S localhost:8000 router.php
```

## Step 6: Test the Site
- Open: http://localhost:8000
- Admin login: `admin` / `admin123`

**Note:** You only need MAMP's MySQL running. The PHP built-in server handles the web server, so you don't need to configure MAMP's Apache.

## Troubleshooting

**Can't connect to database?**
- Check MAMP MySQL port: MAMP → Preferences → Ports
- Make sure MySQL server is running (green light in MAMP)
- Verify database credentials in `.env` file (DB_NAME, DB_USER, DB_PASS, DB_PORT)
- Make sure `.env` file exists in the project root

**CSS not loading?**
- The site uses Tailwind CDN (already configured in `includes/header.php`)
- Make sure you have internet connection

**Page not found errors?**
- Make sure you're running: `php -S localhost:8000 router.php` (with router.php)
- The `router.php` file is required for proper URL routing
