## Project E-Commerce Model ERP Mitra UMKM Amboko Store
Kelompok 5

## Anggota Kelompok
1. Syilvani Amanda 
2. Sekar Ayu Namira
3. Diva Nur Aulia
4. Mushthafa

# AMBOKO — Fashion E-Commerce Website

AMBOKO adalah project website e-commerce fashion yang dibuat untuk menampilkan produk pakaian dengan tampilan modern, sederhana, dan responsive. Website ini dikembangkan secara bertahap menggunakan **PHP, HTML, dan CSS**.
Project ini dibuat sebagai bagian dari pengembangan sistem informasi untuk toko fashion **AMBOKO**, dengan fokus awal pada tampilan website, katalog produk, pencarian, filter kategori, dan pengurutan produk.

## ✨ Tentang AMBOKO

AMBOKO merupakan website fashion yang menyediakan berbagai produk seperti:

* T-Shirt
* Jacket
* Short Pants
* Long Pants
* Mix & Match
* New Edition

Website memiliki konsep visual yang clean dan modern dengan penggunaan warna hitam, putih, abu-abu, serta aksen biru yang menyesuaikan dengan identitas AMBOKO.

## 🚀 Fitur yang Sudah Tersedia

### 🏠 Home

Halaman Home merupakan halaman utama website yang menampilkan:

* Hero banner AMBOKO
* Informasi dan slogan brand
* Running text / marquee
* Banner promo
* Daftar kategori produk
* Produk yang sedang mendapatkan diskon
* Bagian Magazine / Blog & News
* Navbar dan footer

### 🛍️ Catalogue

Halaman Catalogue digunakan untuk melihat seluruh produk AMBOKO.

Fitur yang sudah dapat digunakan:

* Menampilkan daftar produk
* Filter berdasarkan kategori
* Pencarian produk
* Sorting produk
* Sorting berdasarkan harga terendah
* Sorting berdasarkan harga tertinggi
* Sorting berdasarkan nama A-Z
* Tampilan produk "Coming Soon"
* Informasi jumlah produk yang ditampilkan

### 🔎 Pencarian Produk

Pengguna dapat mencari produk melalui kolom pencarian pada navbar.

Pencarian dilakukan menggunakan parameter `GET` sehingga tetap dapat berjalan tanpa menggunakan JavaScript.

### 🗂️ Filter Kategori

Produk dapat difilter berdasarkan beberapa kategori:

* All
* Trousers/Pants
* T-Shirt
* Long Pants
* Jackets
* New Edition

### ↕️ Sorting Produk

Produk dapat diurutkan berdasarkan:

* Most Popular
* Harga Terendah
* Harga Tertinggi
* Nama A-Z

---

## 🧩 Teknologi yang Digunakan

Project ini menggunakan beberapa teknologi dasar web development:

| Teknologi    | Penggunaan                                                  |
| ------------ | ----------------------------------------------------------- |
| PHP          | Membuat halaman dinamis dan memproses data                  |
| HTML         | Membuat struktur halaman                                    |
| CSS          | Mengatur tampilan dan layout website                        |
| Google Fonts | Menggunakan font Poppins                                    |
| MySQL        | Direncanakan untuk integrasi database pada tahap berikutnya |

Untuk tahap saat ini, data produk masih menggunakan **array PHP** dan belum terhubung dengan database MySQL.

## 📁 Struktur Folder

```text
amboko-tahap2/
│
├── project/
│   │
│   ├── index.php
│   ├── catalogue.php
│   ├── README.md
│   ├── .gitignore
│   │
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css
│   │   │
│   │   └── img/
│   │       ├── logo.png
│   │       ├── hero-banner.jpg
│   │       ├── promo-sale.jpg
│   │       ├── product-jaket-home.jpg
│   │       ├── product-short-home.jpg
│   │       ├── product-longpants-home.jpg
│   │       ├── product-tshirt-home.jpg
│   │       ├── catalog-jaket.jpg
│   │       ├── catalog-tshirt.jpg
│   │       ├── catalog-shortpants.jpg
│   │       ├── catalog-longpants.jpg
│   │       ├── catalog-mixmatch.jpg
│   │       └── ...
│   │
│   ├── includes/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── functions.php
│   │
│   └── database/
│       └── README.md
```


## 📄 Penjelasan File

### `index.php`

Merupakan halaman utama/Home AMBOKO.

File ini berisi:

* Hero section
* Promo
* Kategori produk
* Produk diskon
* Magazine
* Navbar dan footer

Data produk pada halaman ini masih disimpan dalam array PHP.

### `catalogue.php`

Merupakan halaman katalog produk.

File ini menangani:

* Filter kategori
* Search produk
* Sorting produk
* Menampilkan produk
* Menampilkan produk yang masih Coming Soon

Seluruh fitur tersebut dibuat menggunakan PHP dan form `GET`, sehingga pada tahap ini belum membutuhkan JavaScript.

### `includes/header.php`

Berisi komponen navbar yang digunakan pada halaman website.

Navbar terdiri dari:

* Logo AMBOKO
* Home
* Catalogue
* Search
* Icon Cart
* Icon Account

### `includes/footer.php`

Berisi footer website yang mencakup:

* Informasi AMBOKO
* Assistance
* Legal
* Copyright

### `includes/functions.php`

Berisi fungsi bantuan yang digunakan oleh halaman website.

Saat ini salah satu fungsi yang tersedia adalah:

```php
format_rupiah()
```

Fungsi tersebut digunakan untuk mengubah angka menjadi format mata uang Rupiah.

### `assets/css/style.css`

Merupakan stylesheet utama yang mengatur tampilan website, seperti:

* Navbar
* Hero
* Button
* Promo
* Product Card
* Catalogue
* Filter
* Footer
* Responsive layout
* Animasi marquee

### `assets/img/`

Berisi seluruh gambar yang digunakan pada website AMBOKO, termasuk logo, banner, dan gambar produk.

---

## 🛠️ Cara Menjalankan Project

### 1. Install XAMPP

Pastikan XAMPP sudah terinstall pada komputer.

### 2. Jalankan Apache

Buka XAMPP Control Panel kemudian jalankan:

```text
Apache
```

Database MySQL belum diperlukan untuk menjalankan fitur pada tahap ini karena data produk masih menggunakan array PHP.

### 3. Letakkan Project

Salin folder project ke dalam folder:

```text
C:\xampp\htdocs\
```

Contohnya:

```text
C:\xampp\htdocs\amboko-tahap2\
```

### 4. Jalankan melalui Browser

Buka browser kemudian akses:

```text
http://localhost/amboko-tahap2/project/
```

Untuk membuka halaman Catalogue:

```text
http://localhost/amboko-tahap2/project/catalogue.php
```

## 📌 Status Project

Project AMBOKO saat ini masih dalam tahap pengembangan.

### Tahap 1

* [x] Membuat halaman Home
* [x] Membuat navbar
* [x] Membuat footer
* [x] Membuat hero section
* [x] Membuat promo section
* [x] Membuat product card
* [x] Menambahkan gambar produk
* [x] Membuat stylesheet utama

### Tahap 2

* [x] Membuat halaman Catalogue
* [x] Filter kategori
* [x] Search produk
* [x] Sorting produk
* [x] Menampilkan jumlah produk
* [x] Tampilan Coming Soon
* [x] Menggunakan PHP tanpa JavaScript

### Tahap Selanjutnya

* [ ] Integrasi database MySQL
* [ ] Sistem login dan akun
* [ ] Product detail
* [ ] Shopping cart
* [ ] Checkout
* [ ] Sistem pemesanan
* [ ] Manajemen stok
* [ ] Sistem admin
* [ ] Integrasi data produk dari database
* [ ] Fitur filter lanjutan
* [ ] Fitur JavaScript untuk interaksi yang lebih lengkap


## 🗄️ Database

Pada tahap saat ini, website belum menggunakan database MySQL ( on progress)

Data produk masih disimpan sementara dalam bentuk array PHP agar pengembangan tampilan dan fungsi dasar dapat dilakukan terlebih dahulu.

Rencana integrasi database akan mencakup data seperti:

* Kategori
* Produk
* Stok
* Pelanggan
* Pesanan
* Detail pesanan
* Promo

Folder database telah disiapkan untuk pengembangan pada tahap berikutnya.

## 🎨 Design Concept

Konsep tampilan AMBOKO menggunakan gaya:

* Modern
* Minimalist
* Clean
* Fashion-oriented
* Simple navigation
* Product-focused

Warna utama yang digunakan:

* Black
* White
* Light Grey
* Blue accent

Website juga menggunakan font **Poppins** untuk memberikan tampilan yang modern dan mudah dibaca.

## 👥 Project Development

Project ini dikembangkan secara bertahap dengan pembagian antara pengembangan tampilan, fungsi website, dan integrasi database.
Struktur project dibuat menggunakan komponen PHP seperti `header.php`, `footer.php`, dan `functions.php` agar kode dapat digunakan kembali pada beberapa halaman.

## 📌 Catatan

Beberapa fitur pada tampilan saat ini masih berupa prototype atau placeholder dan belum sepenuhnya aktif.

Contohnya:

* Price Range
* Material Filter
* Availability Filter
* Shopping Cart
* Account
* Product Detail
* Magazine / Blog
* Database
* Dan Lain-lain

Fitur-fitur tersebut akan dikembangkan pada tahap selanjutnya sesuai kebutuhan project.

## 📜 License

Project ini dibuat untuk keperluan pembelajaran dan pengembangan project AMBOKO.

© 2026 AMBOKO. All Rights Reserved.
