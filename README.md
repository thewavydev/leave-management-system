# Leave Management System

A Laravel-based leave management application that allows employees to request time off and managers to approve or reject leave requests.

## Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL or SQLite (for development)
- Mailpit 

## Installation

1. **Install PHP dependencies:**
   ```bash
   composer install
   ```

2. **Install Node.js dependencies:**
   ```bash
   npm install
   ```

3. **Create environment file:**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Configure database:**

   Open `.env` and update these values:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=leave_management
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

   Or use SQLite for local development:
   ```env
   DB_CONNECTION=sqlite
   ```

6. **Create SQLite database (if using SQLite):**
   ```bash
   touch database/database.sqlite
   ```

7. **Run migrations:**
   ```bash
   php artisan migrate
   ```

8. **Seed the database (optional):**
   ```bash
   php artisan db:seed
   ```

## Running the Application

### Start the development server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Start Vite for frontend assets

```bash
npm run dev
```

### Start Mailpit (email testing tool)

Mailpit is included in the project for catching emails. To start it:

```bash
./mailpit-linux-amd64.tar.gz
```

Or run Mailpit directly:
```bash
mailpit
```

Mailpit web interface will be available at `http://localhost:8025`

## Default Credentials

After seeding, you can login with:

- **Email:** admin@admin.com
- **Password:** password

## Building for Production

```bash
npm run build
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
```

## Mail Configuration

The application uses Mailpit for local email testing. The SMTP settings are already configured in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_ADDRESS=noreply@leave-management.local
MAIL_FROM_NAME="${APP_NAME}"
```

## Available Commands

| Command | Description |
|---------|------------|
| `php artisan migrate` | Run database migrations |
| `php artisan db:seed` | Seed the database with sample data |
| `php artisan make:model User` | Create a new model |
| `php artisan make:controller UserController` | Create a new controller |
| `php artisan make:migration create_users_table` | Create a new migration |
| `php artisan config:cache` | Cache configuration |
| `php artisan route:cache` | Cache routes |

## Troubleshooting

### Database connection errors
- Ensure MySQL is running
- Check database credentials in `.env`
- Create the database if it doesn't exist: `CREATE DATABASE leave_management;`

### Mail issues
- Make sure Mailpit is running: `http://localhost:8025`
- Check SMTP port in `.env` (default: 1025)

### Permission errors
```bash
sudo chown -R $USER:www-data storage/
sudo chown -R $USER:www-data bootstrap/cache/
```