# Inventaris Barang - Laravel Dockerized Project

Proyek ini menyediakan lingkungan Dockerized untuk Laravel 11, termasuk PHP, Nginx, dan MySQL untuk keperluan pengembangan. Ikuti langkah-langkah di bawah untuk menjalankan proyek ini.

Proyek ini dibuat untuk memenuhi tugas UTS mata kuliah pemrograman sisi server. Proyek ini dibuat secara berkelompok dengan anggota kelompok sebagai berikut:

-   Naufal Zhafif Pradipta (A11.2022.14474)
-   Aurel Putri Widyanti (A11.2022.14494)
-   Ahmad Nabilul As'ad (A11.2022.14488)

## Deskripsi Proyek

Aplikasi ini bertujuan untuk mengelola persediaan barang di suatu toko, termasuk manajemen kategori barang, pemasok, dan admin yang bertanggung jawab dalam pengelolaan data. Fitur utama dari aplikasi ini meliputi:

-   Pengelolaan data admin.
-   Pengelolaan data barang.
-   Pengelolaan data kategori barang.
-   Pengelolaan data pemasok.
-   Pencatatan setiap perubahan data berdasarkan admin yang bertanggung jawab dalam menginput data tersebut.

Aplikasi ini diharapkan dapat membantu dalam mengelola persediaan barang secara efisien dan terstruktur.

## Prasyarat

Pastikan Anda telah menginstal:

-   [Docker](https://docs.docker.com/get-docker/)
-   [Docker Compose](https://docs.docker.com/compose/install/)

## Memulai

### Langkah 1: Clone Repository

```bash
git clone https://github.com/naufalzp/laravel-pss.git
cd laravel-pss
```

`Pastikan Docker Engine sudah berjalan sebelum melanjutkan.`

### Langkah 2: Build dan Jalankan Kontainer Docker

Pastikan berada di direktori utama proyek (`laravel-pss`) dan jalankan perintah berikut untuk membangun dan memulai kontainer:

```bash
docker-compose up -d --build
```

### Langkah 3: Atur Izin

Untuk menghindari masalah izin, atur izin untuk direktori penyimpanan (`storage`) dan cache Laravel:

```bash
docker-compose exec app chmod -R 777 /var/www/storage /var/www/bootstrap/cache
```

### Langkah 4: Konfigurasi Laravel

1. Install dependensi Laravel menggunakan Composer:

    ```bash
    docker exec laravel-app composer install
    ```

2. Salin file `.env.example` menjadi `.env`:

    ```bash
    docker exec laravel-app cp .env.example .env
    ```

3. Generate application key:

    ```bash
    docker exec laravel-app php artisan key:generate
    ```

### Langkah 5: Atur Konfigurasi Database

Perbarui konfigurasi database di file `.env` yang berada di direktori `laravel-pss-app`:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel-pss
DB_USERNAME=laravel-pss
DB_PASSWORD=laravel
```

### Langkah 6: Jalankan Migrasi

Jalankan migrasi untuk membuat tabel dan `--seed` untuk mengisi data awal:

```bash
docker exec laravel-app php artisan migrate --seed
```

## Mengakses Aplikasi

Setelah kontainer berjalan, Anda bisa mengakses aplikasi Laravel di: [http://localhost:8080](http://localhost:8080)

## Mengakses Admin Panel

Anda bisa mengakses admin panel di: [http://localhost:8080/admin](http://localhost:8080/admin), dengan akun admin yang berada di file `database/seeders/AdminSeeder.php` atau menggunakan akun berikut:

-   **Email**: `admin@mail.com`

-   **Password**: `password`

## Dokumentasi API

Dokumentasi API dapat diakses di: [http://localhost:8080/docs/api](http://localhost:8080/docs/api)

## Menghentikan Kontainer

Untuk menghentikan kontainer Docker, jalankan:

```bash
docker-compose down
```

## Perintah Tambahan

-   **Membangun Ulang Kontainer**: Jika Anda melakukan perubahan pada `Dockerfile` atau `docker-compose.yml`, Anda dapat membangun ulang kontainer dengan:

    ```bash
    docker-compose up -d --build
    ```

-   **Mengakses Kontainer PHP**: Untuk masuk ke dalam kontainer PHP dan menjalankan perintah Artisan, gunakan:

    ```bash
    docker exec -it laravel-app bash
    ```

-   **Mengakses Kontainer MySQL**: Untuk masuk ke dalam kontainer MySQL, gunakan:

    ```bash
    docker exec -it laravel-db mysql -u laravel-pss -p
    ```

    Masukan password `laravel` untuk mengakses database.

## Struktur Proyek

-   `Dockerfile`: Mendefinisikan lingkungan PHP-FPM.
-   `docker-compose.yml`: Mengatur kontainer Laravel, Nginx, dan MySQL.
-   `laravel-pss-app`: Direktori aplikasi Laravel
-   `mysql-data`: Direktori penyimpanan data MySQL.
-   `nginx/laravel.conf`: File konfigurasi Nginx untuk menjalankan aplikasi Laravel.
