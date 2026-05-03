# Sistem Informasi Perpustakaan Sederhana

Sebuah aplikasi sistem informasi perpustakaan berbasis web yang dibangun dengan PHP native tanpa menggunakan framework.

## Fitur Utama

- Manajemen Buku (tambah, edit, hapus, lihat daftar)
- Manajemen Anggota (tambah, edit, hapus, lihat daftar)
- Manajemen Peminjaman Buku (pinjam, kembalikan, lihat riwayat)
- Laporan Peminjaman
- Sistem Login dengan peran (admin dan petugas)

## Struktur Project

```
project-perpus/
├── app/
│   ├── controllers/      # Controller MVC
│   ├── models/           # Model MVC
│   └── views/            # View MVC
├──assets/                # Screenshots sistem
├── core/                 # Core sistem & konfigurasi
│   ├── Database.php      # Kelas database
│   └── Controller.php    # Base controller
├── app/views/layouts/    # Template layout
└── index.php             # Entry point & router
```

## Teknologi yang Digunakan

- PHP Native (tanpa framework)
- MySQL/MariaDB sebagai database
- HTML/CSS/JavaScript untuk frontend
- Bootstrap (kemungkinan, perlu dicek di view)

## Instalasi

1. **Clone atau download** repository ini
2. **Letakkan di folder htdocs** (jika menggunakan XAMPP) atau folder www (jika menggunakan Laragon)
3. **Buat database** bernama `perpus_db` di MySQL/MariaDB
4. **Import struktur database** dari file `core/perpus_db.sql`
5. **Pastikan PHP sudah terinstall** dan berjalan dengan baik
6. **Akses aplikasi** melalui browser: `http://localhost/project-perpus/`

## Konfigurasi Database

Konfigurasi database berada di file `core\Database.php`:
```php
private $host = "localhost";
private $db_name = "perpus_db";
private $username = "root";    // Ganti jika perlu
private $password = "";        // Ganti jika perlu
private $charset = "utf8mb4";
```

## Default Login

Setelah instalasi, Anda bisa login dengan kredensial berikut:

### Admin
- Username: `admin`
- Password: `admin`
- Role: `admin`

### Petugas
- Username: `petugas`
- Password: `123456`
- Role: `petugas`

## Struktur Database

Tabel yang ada dalam database `perpus_db`:

1. **anggota** - Data anggota perpustakaan
   - id, nama, alamat

2. **buku** - Data buku perpustakaan
   - id, judul, penulis, penerbit, tahun_terbit, stok

3. **peminjaman** - Transaksi peminjaman buku
   - id, id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status

4. **users** - Pengguna sistem
   - id, username, password, role

## Cara Menggunakan

1. **Login** menggunakan kredensial admin atau petugas di atas
2. Setelah login, Anda akan diarahkan ke dashboard
3. Menu navigasi tersedia di sidebar/header (tergantung implementasi)
4. Manajemen buku, anggota, dan peminjaman dapat dilakukan melalui menu masing-masing
5. Untuk laporan, kunjungi menu laporan
6. Logout dapat dilakukan melalui menu user di kanan atas

## Catatan

- Ini adalah aplikasi sederhana untuk tujuan pembelajaran
- Keamanan masih sangat dasar (password plaintext di database, tidak ada hashing)
- Untuk penggunaan produksi, disarankan untuk:
  - Menambah password hashing
  - Menambah validasi input
  - Menggunakan prepared statement yang lebih konsisten
  - Menambah autentikasi dan otorisasi yang lebih robust
  - Menggunakan HTTPS

## Pengembangan Lanjutan

Beberapa hal yang bisa ditambahkan untuk pengembangan lanjutan:
- Implementasi password hashing (bcrypt/argon2)
- Validasi form dari sisi client dan server
- Paginasi untuk daftar buku/anggota yang banyak
- Pencarian buku/anggota yang lebih avançat
- Sistem rezervasi buku
- Notifikasi email untuk pengembalian buku yang terlambat
- Export laporan ke PDF/Excel
- Responsif design untuk mobile
- Unit testing dengan PHPUnit
