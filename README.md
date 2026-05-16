# SYMITRA - IT Resource & Asset Management System

SYMITRA adalah platform manajemen aset IT yang mencakup inventaris hardware, manajemen IP Address, dan kredensial Remote Access.

## Fitur Utama
- **Dashboard Analytics:** Visualisasi distribusi aset menggunakan Chart.js.
- **Hardware Management:** Inventory Notebook, PC, Printer, dan Copier.
- **Network Directory:** Alokasi IP Address dan manajemen Remote Access.
- **Master Data:** Departemen, Device Type, dan Lokasi yang tersentralisasi.
- **Export Feature:** Export data ke Excel menggunakan SheetJS.

## Cara Instalasi
1. Clone repository ini.
2. Jalankan `composer install`.
3. Jalankan `npm install && npm run build`.
4. Copy `.env.example` ke `.env` dan atur koneksi database.
5. Jalankan `php artisan key:generate`.
6. Import file `database_symitra.sql` ke MySQL Anda.
7. Jalankan `php artisan serve`.
