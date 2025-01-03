# Panduan Instalasi Elevent API (Backend)

- Panduan ini menjelaskan langkah-langkah untuk menginstall Aplikasi Elevent API

### 1. Buat Database
- Buat database dengan nama "elevent_db"
- Copy paste file .env.example dengan nama file .env kemudian atur config database di file .env

### 2. Install Composer
```bash
composer install
```

### 3. Jalankan Migrasi dan Jalankan Seeder
```bash
php artisan migrate
```
```bash
php artisan db:seed
```
### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Clear Optimize
```bash
php artisan optimize:clear
```

### 6. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di http://localhost:8000 
