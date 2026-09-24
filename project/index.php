<?php
/**
 * index.php — Halaman Home
 * Tahap 1: tampilan statis (data produk masih berupa array PHP),
 * belum tersambung ke database. Struktur data ini sengaja dibuat
 * mirip tabel "produk" supaya di Tahap 4 tinggal diganti hasil query.
 */

$baseUrl    = '';
$activePage = 'home';
$pageTitle  = 'Home';

require_once __DIR__ . '/includes/functions.php';

// Data sementara produk yang sedang diskon (nanti dari tabel `produk` + `promo`)
$produkDiskon = [
    [
        'nama'   => 'Loose Fit Jacket',
        'harga'  => 120000,
        'diskon' => 15,
        'gambar' => 'assets/img/product-jaket-home.jpg',
        'slug'   => 'loose-fit-jacket',
    ],
    [
        'nama'   => 'Short Pants',
        'harga'  => 35000,
        'diskon' => 10,
        'gambar' => 'assets/img/product-short-home.jpg',
        'slug'   => 'short-pants',
    ],
    [
        'nama'   => 'Long Pants',
        'harga'  => 80000,
        'diskon' => 10,
        'gambar' => 'assets/img/product-longpants-home.jpg',
        'slug'   => 'long-pants',
    ],
    [
        'nama'   => 'T-Shirt',
        'harga'  => 50000,
        'diskon' => 10,
        'gambar' => 'assets/img/product-tshirt-home.jpg',
        'slug'   => 't-shirt',
    ],
];

// Kategori cepat pada bagian promo (nanti dari tabel `kategori`)
$kategoriCepat = [
    ['nama' => 'Trousers/Pants', 'link' => 'catalogue.php?kategori=trousers-pants'],
    ['nama' => 'T-Shirt',        'link' => 'catalogue.php?kategori=t-shirt'],
    ['nama' => 'Long Pants',     'link' => 'catalogue.php?kategori=long-pants'],
    ['nama' => 'Jackets',        'link' => 'catalogue.php?kategori=jackets'],
    ['nama' => 'New Edition',    'link' => 'catalogue.php?kategori=new-edition'],
];

require __DIR__ . '/includes/header.php';
?>

<!-- ============ HERO ============ -->
<section class="hero">
    <img src="assets/img/hero-banner.jpg" alt="Better Days Ahead - koleksi AMBOKO">
    <div class="hero__quote">
        <p>&ldquo;Built for <strong>Motion</strong>,<br>worn for <em>Statement.</em>&rdquo;</p>
    </div>
</section>

<!-- ============ MARQUEE 1 ============ -->
<div class="marquee">
    <div class="marquee__track">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <span>Popular this month</span>
        <?php endfor; ?>
    </div>
</div>

<!-- ============ PROMO + KATEGORI ============ -->
<section class="section">
    <div class="container">
        <div class="promo-grid">
            <div class="promo-grid__banner">
                <img src="assets/img/promo-sale.jpg" alt="Pre-Black Friday Sale">
                <div class="promo-grid__banner-caption">
                    <span class="tag">PRE-BLACK FRIDAY</span>
                    <span class="headline">SALE</span>
                </div>
                <div class="promo-grid__banner-footer">
                    10-15% OFF<br>SALE ITEMS
                </div>
            </div>
            <nav class="category-list">
                <?php foreach ($kategoriCepat as $kategori): ?>
                    <a href="<?php echo htmlspecialchars($kategori['link']); ?>">
                        <?php echo htmlspecialchars(strtoupper($kategori['nama'])); ?>
                        <span>&rarr;</span>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>
</section>

<!-- ============ MARQUEE 2 ============ -->
<div class="marquee marquee--light">
    <div class="marquee__track">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <span>Sale up to -15%</span>
        <?php endfor; ?>
    </div>
</div>

<!-- ============ PRODUK DISKON ============ -->
<section class="section">
    <div class="container">
        <div class="product-grid product-grid--4">
            <?php foreach ($produkDiskon as $produk): ?>
                <a href="product-detail.php?slug=<?php echo urlencode($produk['slug']); ?>"
                   class="product-card product-card--framed">
                    <div class="product-card__media">
                        <span class="badge-discount">-<?php echo (int) $produk['diskon']; ?>%</span>
                        <img src="<?php echo htmlspecialchars($produk['gambar']); ?>"
                             alt="<?php echo htmlspecialchars($produk['nama']); ?>">
                    </div>
                    <div class="product-card__body">
                        <div>
                            <p class="product-card__title"><?php echo htmlspecialchars($produk['nama']); ?></p>
                            <p class="product-card__price"><?php echo format_rupiah($produk['harga']); ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MARQUEE 3 ============ -->
<div class="marquee">
    <div class="marquee__track">
        <?php for ($i = 0; $i < 6; $i++): ?>
            <span>Blog and News</span>
        <?php endfor; ?>
    </div>
</div>

<!-- ============ MAGAZINE ============ -->
<section class="section">
    <div class="container">
        <div class="magazine">
            <h2 class="magazine__title">Magazine</h2>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="magazine__card">
                    <div class="magazine__thumb">Artikel segera hadir</div>
                    <p>Judul artikel menyusul</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
