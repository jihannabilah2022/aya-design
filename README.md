# AyaDesign - Platform Jual Beli Design

Selamat datang di AyaDesign, platform jual beli design yang memudahkan pengguna untuk menjual dan membeli desain kreatif!

## Anggota Kelompok
1. Muhammad Bintang Indra Hidayat (2208107010023)
2. Azzariyat Azra (2208107010079)

## Deskripsi Proyek

AyaDesign adalah platform online yang memfasilitasi pengguna untuk membeli dan menjual desain kreatif. Dengan AyaDesign, para desainer dapat memamerkan karya mereka kepada pelanggan potensial, sementara pelanggan dapat mencari desain yang sesuai dengan kebutuhan mereka dengan mudah.

## Cara Penggunaan

1. Pengguna dapat mendaftar akun baru sebagai pelanggan.
2. Desainer dapat mengunggah desain mereka ke platform dan menentukan harga.
3. Pelanggan dapat menjelajahi galeri desain, mencari desain yang mereka sukai, dan melakukan pembelian.
4. Setelah melakukan checkout, pengguna akan diarahkan ke WhatsApp admin dengan pesanan dan deskripsi yang sesuai.
   
## Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi AyaDesign:

1. **Clone Repositori:**
- git clone https://github.com/MuhammadBintang27/aya-design.git

2. **Buat Database:**
- Salin file .env.example menjadi .env (cp .env.example .env)
- Atur koneksi database (db_connection) menjadi mysql
- Tentukan nama database (db_database) sebagai aya_design
- Buat database baru dengan nama `aya_design`.

3. **Impor Dump SQL:**
- Impor dump SQL (aya_design.sql) yang tersedia di repositori GitHub ke dalam database `aya_design`.

4. **Instal Dependensi:**
- composer update
- npm install 

5. **Menjalankan Aplikasi:**
- Buka dua terminal:
  - Terminal pertama: Jalankan server PHP dengan perintah:
    ```
    php artisan serve
    ```
  - Terminal kedua: Jalankan proses kompilasi untuk pengembangan dengan perintah:
    ```
    npm run dev
    ```

Setelah langkah-langkah di atas selesai, Anda dapat mengakses aplikasi AyaDesign di browser Anda pada `http://localhost:8000`. Pastikan Anda sudah memiliki lingkungan pengembangan yang sesuai (seperti PHP, Composer, dan Node.js) terinstal sebelum memulai proses instalasi ini. Jika Anda mengalami masalah atau kesulitan, jangan ragu untuk menghubungi kami.
