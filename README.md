# SYMITRA - IT Resource & Asset Management System

SYMITRA adalah platform manajemen aset IT yang dirancang untuk efisiensi inventaris hardware, manajemen alokasi IP Address, dan penyimpanan kredensial remote access secara terorganisir.

---

## 🚀 Fitur Utama

- 📊 **Dashboard Analytics**  
  Visualisasi real-time distribusi aset dan status kondisi menggunakan Chart.js.

- 💻 **Hardware Management**  
  Manajemen inventaris Notebook, PC, Printer, dan Copier secara detail.

- 🌐 **Network Directory**  
  Pengelolaan alokasi IP Address dan database akses remote.

- ⚙️ **Master Data Setup**  
  Konfigurasi tersentralisasi untuk Departemen, Tipe Perangkat, Proyek, dan Lokasi.

- 📁 **Export System**  
  Export laporan ke format Excel menggunakan SheetJS (XLSX).

---

## 🛠️ Panduan Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/symitra.git
cd symitra
```

---

### 2. Install Dependency

Install dependency PHP dan JavaScript:

```bash
composer install
npm install
```

---

### 3. Build Asset Tailwind CSS

Langkah ini **WAJIB** dilakukan agar tampilan UI berjalan dengan benar dan seluruh class Tailwind CSS dapat terbaca.

```bash
npm run build
```

> ⚠️ **Catatan:**  
> Tanpa langkah ini, aplikasi tetap berjalan tetapi styling CSS tidak akan tampil dengan semestinya.

---

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Atur konfigurasi database pada file `.env`:

```env
DB_DATABASE=db_symitra
DB_USERNAME=root
DB_PASSWORD=
```

Generate application key:

```bash
php artisan key:generate
```

---

### 5. Persiapan Database

1. Buat database baru di MySQL, contoh:

```sql
CREATE DATABASE db_symitra;
```

2. Import file `symitra.sql` yang tersedia di root project ke database tersebut.

---

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di:

```txt
http://127.0.0.1:8000
```

---

## 🧩 Teknologi yang Digunakan

- Laravel
- Tailwind CSS
- Chart.js
- SheetJS (XLSX)
- MySQL

---

## 📌 Catatan

Pastikan:

- PHP dan Composer sudah terinstall
- Node.js & NPM sudah tersedia
- MySQL aktif sebelum menjalankan aplikasi

---
