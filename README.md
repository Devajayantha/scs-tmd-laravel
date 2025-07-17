# 🚀 Laravel 12 Project

A modern web application built using [Laravel 12](https://laravel.com). This project includes authentication, validation, secure file handling, and best practices for scalable development.

---

## 📚 Requirements

- PHP >= 8.2
- Composer
- MySQL / PostgreSQL
- Node.js & NPM

---

## 🔧 Installation

```bash
# Clone the project
git clone https://github.com/Devajayantha/scs-tmd-laravel.git
cd scs-tmd-laravel

# Install PHP dependencies
composer install

# Install JS dependencies
npm install && npm run build

# Copy .env and generate key
cp .env.example .env
php artisan key:generate
```

---

## 🗄️ Database Setup

### 1. Create Database

```sql
CREATE DATABASE laravel_project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Or via terminal:

```bash
mysql -u root -p -e "CREATE DATABASE laravel_project CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 2. Update `.env` file

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_project
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 3. Run Migrations & Seeders

```bash
php artisan migrate
```

---

## 🔐 Authentication & Authorization

- Authentication using Laravel built-in system
- Authorization via Policies

Example usage:
```php
$this->authorize('update', $note);
```

---

## 🛠️ Useful Artisan Commands

```bash
php artisan serve               # Start development server
php artisan migrate             # Run migrations
php artisan make:model Post -mcr  # Generate model, migration, controller, resource
```

---

## 🛡️ Security Best Practices

- ✅ CSRF Protection enabled
- ✅ Environment variables managed via `.env`
- ✅ Form Request validation
- ✅ Passwords hashed
- ✅ Content privacy with `bcrypt`
- ✅ Authorization via Policies Middleware
- ✅ Avoid Mass Assignment using `$fillable`
- ✅ SQL Injection

---

## 🗂️ Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   └── Requests/
├── Models/
├── Policies/
routes/
├── web.php
resources/
├── views/
│   └── layouts/
```

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 👨‍💻 Author

**Deva Jayantha** 
