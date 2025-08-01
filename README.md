<p align="center">
  <a href="https://github.com/AndiMPanguriseng/wareHouseApi" target="_blank">
    <img src="https://img.shields.io/badge/WareHouseAPI-Laravel%2011-red?style=for-the-badge&logo=laravel" alt="WareHouse API Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/AndiMPanguriseng/wareHouseApi/actions">
    <img src="https://img.shields.io/github/actions/workflow/status/AndiMPanguriseng/wareHouseApi/laravel.yml?style=flat-square" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/laravel">
    <img src="https://img.shields.io/packagist/v/laravel/laravel?style=flat-square" alt="Laravel Version">
  </a>
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/license-MIT-green?style=flat-square" alt="License">
  </a>
</p>

---

# 📦 WareHouse API

API untuk sistem manajemen gudang yang mendukung:
- user
- Barang
- Kategori
- Supplier
- Gudang
- Mutasi (barang masuk/keluar)

Dibangun dengan **Laravel 11** + **MySQL**.

---

## 🚀 Cara Menggunakan

### 1. Clone Repository
```bash
git clone https://github.com/AndiMPanguriseng/wareHouseApi.git
cd wareHouseApi

### 2. Setup Environment
```bash
cp .env.example .env

### 3. atur env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourDatabaseName
DB_USERNAME=root
DB_PASSWORD=

### 4. Generate key
php artisan key:generate

### 5. Migrasi and seed
php artisan migrate --seed

php artisan serve

