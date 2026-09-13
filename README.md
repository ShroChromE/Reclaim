# Reclaim — Sistem Lost & Found Sekolah

Reclaim adalah aplikasi web berbasis Laravel yang membantu warga sekolah menemukan kembali barang yang hilang. Alih-alih mengandalkan mading fisik atau grup chat yang berantakan, Reclaim mengumpulkan semua laporan barang hilang dan ditemukan dalam satu papan digital yang mudah dicari, sehingga proses pengembalian barang ke pemiliknya menjadi lebih cepat dan terorganisir.

## Deskripsi Masalah & Solusi

Di lingkungan sekolah, barang yang hilang biasanya dilaporkan lewat cara yang tidak terpusat seperti mading, grup WhatsApp kelas, atau dari TU. Cara ini membuat laporan mudah terlewat, sulit dilacak statusnya, dan tidak ada riwayat yang jelas kapan suatu barang akhirnya dikembalikan.

Reclaim menjawab masalah ini dengan:
- Satu papan terpusat untuk semua laporan barang hilang & ditemukan
- Pencarian dan filter berdasarkan nama barang, lokasi, atau kategori
- Riwayat status tiap barang (belum ditemukan -> belum diklaim -> sudah dikembalikan)
- Panel khusus admin/petugas untuk mengelola barang dan memverifikasi klaim

## Anggota Tim & Peran

| Nama | Peran |
|---|---|
| Owen Christian | Front-End Developer |
| Kenzo Rivaldo | Front-End Developer |
| William Tjandera | UI/UX Designer |

## Fitur Utama

- **Beranda publik** — menampilkan ringkasan jumlah laporan hilang/ditemukan/dikembalikan
- **Lost & Found** — daftar semua barang dengan pencarian, filter kategori/status, dan tab (Semua, Hilang, Ditemukan, Sudah Dikembalikan)
- **Detail Barang** — informasi lengkap satu barang (kategori, lokasi, tanggal, waktu, pelapor)
- **Report Item** — form untuk melaporkan barang hilang atau ditemukan
- **My Reports & Claims** — daftar laporan dan klaim milik pengguna yang sedang login, lengkap dengan status (Menunggu/Selesai)
- **Dashboard** — ringkasan aktivitas sistem untuk pengguna umum
- **Admin Dashboard** — statistik sistem untuk admin (total barang, laporan hilang, grafik aktivitas 7 hari terakhir, status barang)
- **Manage Items & Claims** *(admin)* — kelola semua barang dan klaim yang masuk dalam satu halaman bertab (Semua Barang, Barang Hilang, Barang Ditemukan, Klaim Masuk)
- **Autentikasi** — registrasi dan login menggunakan Laravel Breeze

## Teknologi yang Digunakan

- **Backend:** Laravel 13.26.1
- **Frontend:** Blade Templating, Tailwind CSS
- **Autentikasi:** Laravel Breeze
- **Database:** MySQL
- **Build tool:** Vite
- **Version control:** Git & GitHub

## Status Proyek

> 📌 Saat ini aplikasi berada pada tahap **tampilan (views) dengan data dummy** — seluruh halaman sudah dapat diakses dan menampilkan desain final, namun belum terhubung ke database sungguhan. Data yang tampil (nama barang, status, dsb.) masih berupa data statis di controller untuk keperluan demonstrasi antarmuka. Migrasi database, model Eloquent, serta autentikasi/otorisasi penuh (role admin vs siswa) menyusul pada tahap berikutnya.

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/ShroChromE/Reclaim.git
   cd Reclaim
   ```

2. **Install dependency PHP**
   ```bash
   composer install
   ```

3. **Install dependency JavaScript**
   ```bash
   npm install
   ```

4. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi database** di file `.env`

   MySQL:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=reclaim
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Jalankan migrasi**
   ```bash
   php artisan migrate
   ```

8. **Jalankan aplikasi**
```bash
   composer run dev
```
   Perintah ini otomatis menjalankan server Laravel, Vite (untuk Tailwind CSS), queue listener, dan log viewer sekaligus dalam satu terminal.

9. Buka `http://127.0.0.1:8000` di browser.

## Penggunaan

1. **Registrasi akun** melalui halaman `/register`, atau langsung **login** di `/login` jika sudah punya akun.
    (Untuk sekarang register masih tidak di enforce karena di routing belum ditambahkan middleware)
2. Setelah login, gunakan **sidebar** di sisi kiri untuk berpindah antar halaman:
   - **Lost & Found** — melihat dan mencari semua laporan barang
   - **Report Item** — melaporkan barang hilang/ditemukan baru
   - **My Reports & Claims** — melihat laporan dan klaim milik sendiri
   - **Dashboard** — ringkasan aktivitas
   - **Detail** - page detail barang (hanya untuk melihat detail page dulu)
3. Pengguna dengan peran **admin** (role belum diintegrasikan) memiliki akses tambahan ke:
   - **Admin Dashboard** — statistik dan grafik aktivitas sistem
   - **Manage Items & Claims** — mengelola seluruh barang dan memverifikasi klaim yang masuk

## Struktur Route Utama

| Route | Deskripsi |
|---|---|
| `/` | Beranda publik |
| `/login`, `/register` | Autentikasi |
| `/dashboard` | Dashboard umum |
| `/items` | Daftar Lost & Found |
| `/items/create` | Form laporkan barang |
| `/items/{item}` | Detail barang |
| `/my-reports` | Laporan & klaim milik pengguna |
| `/admin/dashboard` | Dashboard admin |
| `/admin/items` | Kelola barang & klaim |

## Kontribusi & Alur Kerja Git

Proyek ini menggunakan branch `main` sebagai basis utama, dengan branch terpisah untuk setiap fitur yang sedang dikerjakan. Setiap perubahan dikerjakan pada branch fitur masing-masing sebelum digabungkan ke `main`.