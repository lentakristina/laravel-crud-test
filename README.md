# Product Management System

Aplikasi CRUD sederhana untuk manajemen produk menggunakan Laravel dan PostgreSQL.

## Tech Stack

- Laravel 10
- PostgreSQL  
- Bootstrap 5  
- PHP 8

## Fitur

- List produk dengan pagination  
- Tambah produk baru  
- Edit produk  
- Hapus produk  
- Validasi form
- 
## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/product-management.git
cd product-management
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=produk_db
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 5. Buat Database
```bash
CREATE DATABASE produk_db;
```

### 6. Migrate Database
```bash
php artisan migrate
```

### 7. Jalankan Server
```bash
php artisan serve
```

## Testing

- Buka http://localhost:8000/products
- Klik Tambah Produk
- Isi form dan simpan
- Test edit dan hapus produk
