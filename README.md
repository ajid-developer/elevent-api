# Panduan Instalasi Elevent API (Backend)

- Panduan ini menjelaskan langkah-langkah untuk menginstall Aplikasi Elevent API

### 1. Buat Database
- Buat database dengan nama "elevent_db"
- Copy paste file .env.example dengan nama file .env kemudian atur config database di file .env

### 2. Jalankan Migrasi dan Jalankan Seeder
```bash
php artisan migrate
```


### 3. Mengatur Permission Folder
```bash
chown -R www-data:www-data /path-root-folder
```
```bash
find /path-root-folder -type f -exec chmod 644 {} \;  
find /path-root-folder -type d -exec chmod 755 {} \;  
```

```bash
sudo chgrp -R www-data storage /path-root-folder/bootstrap/cache
sudo chmod -R ug+rwx storage /path-root-folder/bootstrap/cache
```
### 4. Menjalankan Docker Compose
```bash
docker compose build
```

```bash
docker compose up -d
```

### 5. Cek Status & Log
Cek status container dan cek log container dengan perintah berikut :
```bash
docker compose ps
```

```bash
docker compose logs
```

Pastikan status UP pada container dan tidak terdapat masalah pada log

### 6.Konfigurasi Laravel
```bash
docker container exec otobot-backend composer install
```

Membersikan data di database dan menjalankan ulang seeder file dengan data baru
```bash
docker container exec otobot-backend php artisan migrate:fresh --seed
```

```bash
docker container exec otobot-backend php artisan key:generate
```

```bash
docker container exec otobot-backend php artisan storage:link
```

```bash
docker container exec otobot-backend php artisan optimize:clear
```

### 7. Akses Aplikasi
Silahkan akses aplikasi pada URL http://localhost:8300/api/v1

