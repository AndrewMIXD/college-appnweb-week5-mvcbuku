# MVC PHP Native - Data Buku

Aplikasi CRUD sederhana untuk mengelola data buku, dibuat untuk mempelajari pola Model-View-Controller pada PHP Native.

Dibuat oleh: Andrew Pratama Widjaja (109062530015)

## Data Buku
Atribut: `isbn` (unik), `judul`, `penulis`, `penerbit`, `tahun_terbit`.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Laragon (atau XAMPP)
- Git

## Instalasi
1. Clone repository ke folder `www` Laragon:
   `git clone https://github.com/AndrewMIXD/college-appnweb-week5-mvcbuku.git`
2. Jalankan Laragon (Start All).
3. Import `database/perpustakaan.sql` lewat HeidiSQL (File > Run SQL file).
4. Sesuaikan `config/database.php` jika username/password MySQL berbeda.
5. Buka `http://localhost/college-appnweb-week5-mvcbuku/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data (`Buku.php`).
- `app/controllers/` : alur request, validasi, dan pesan status (`BukuController.php`).
- `app/views/buku/` : tampilan HTML (daftar, tambah, edit).
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point dan router aplikasi.

## Fitur
- Menampilkan daftar buku
- Menambah data buku
- Mengubah data buku
- Menghapus data buku
- Validasi field wajib dan tahun terbit harus angka
- Pesan berhasil/gagal setelah setiap operasi, termasuk ISBN duplikat

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan.

## Histori Git
Hasil `git log --oneline`:

```
(paste di sini)
```