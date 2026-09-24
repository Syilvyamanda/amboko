<?php
/**
 * catalogue.php — Halaman Catalogue
 * Tahap 2: masih data array PHP (belum database), TANPA JavaScript.
 *
 * Yang sudah BENAR-BENAR jalan tanpa JS (murni PHP, via link/form GET):
 *  - Filter kategori (klik pill kategori)
 *  - Pencarian (dari kolom search di navbar)
 *  - Urutkan produk (pilih di dropdown lalu klik tombol panah)
 *
 * Yang masih tampilan saja (belum fungsional, menyusul saat sudah boleh
 * pakai JavaScript di tahap lanjutan): filter Price Range, Material,
 * dan Availability, serta tombol "+" (quick add to cart).
 */

$baseUrl    = '';
$activePage = 'catalogue';
$pageTitle  = 'Catalogue';

require_once __DIR__ . '/includes/functions.php';

// ---------------------------------------------------------
// "Database sementara" — nanti di Tahap 4 diganti query SQL
// ---------------------------------------------------------
$produkKatalog = [
    [
        'nama'    => 'Loose fit Jacket',
        'harga'   => 120000,
        'gambar'  => 'assets/img/catalog-jaket.jpg',
        'kategori'=> 'jackets',
        'slug'    => 'loose-fit-jacket',
    ],
    [
        'nama'    => 'T-Shirt',
        'harga'   => 50000,
        'gambar'  => 'assets/img/catalog-tshirt.jpg',
        'kategori'=> 't-shirt',
        'slug'    => 't-shirt',
    ],
    [
        'nama'    => 'Short Pants',
        'harga'   => 35000,
        'gambar'  => 'assets/img/catalog-shortpants.jpg',
        'kategori'=> 'trousers-pants',
        'slug'    => 'short-pants',
    ],
    [
        'nama'    => 'Long Pants',
        'harga'   => 80000,
        'gambar'  => 'assets/img/catalog-longpants.jpg',
        'kategori'=> 'long-pants',
        'slug'    => 'long-pants',
    ],
    [
        'nama'    => 'Mix & Match',
        'harga'   => 200000,
        'gambar'  => 'assets/img/catalog-mixmatch.jpg',
        'kategori'=> 'mix-match',
        'slug'    => 'mix-match',
    ],
    [
        'nama'    => 'New Edition',
        'harga'   => null, // belum dijual -> tampil sebagai kartu "Coming soon"
        'gambar'  => null,
        'kategori'=> 'new-edition',
        'slug'    => null,
    ],
];

$kategoriList = [
    'all'            => 'All',
    'trousers-pants' => 'Trousers/pants',
    't-shirt'        => 'T-Shirt',
    'long-pants'     => 'Long Pants',
    'jackets'        => 'Jackets',
    'new-edition'    => 'New Edition',
];

$sortList = [
    'popular'    => 'Most Popular',
    'price-asc'  => 'Harga Terendah',
    'price-desc' => 'Harga Tertinggi',
    'name-asc'   => 'Nama A-Z',
];

// ---------------------------------------------------------
// Ambil & validasi input dari URL (GET) — tanpa JS
// ---------------------------------------------------------
$kategoriAktif = $_GET['kategori'] ?? 'all';
if (!array_key_exists($kategoriAktif, $kategoriList)) {
    $kategoriAktif = 'all';
}

$sortAktif = $_GET['sort'] ?? 'popular';
if (!array_key_exists($sortAktif, $sortList)) {
    $sortAktif = 'popular';
}

$keyword = trim($_GET['q'] ?? '');

// ---------------------------------------------------------
// Proses filter + sorting
// ---------------------------------------------------------
$produkComingSoon = array_filter($produkKatalog, function ($p) {
    return $p['harga'] === null;
});

$produkTampil = array_filter($produkKatalog, function ($p) use ($kategoriAktif, $keyword) {
    if ($p['harga'] === null) {
        return false; // ditangani terpisah di bawah
    }
    $cocokKategori = ($kategoriAktif === 'all') || ($p['kategori'] === $kategoriAktif);
    $cocokKeyword  = ($keyword === '') || (stripos($p['nama'], $keyword) !== false);
    return $cocokKategori && $cocokKeyword;
});
$produkTampil = array_values($produkTampil);

switch ($sortAktif) {
    case 'price-asc':
        usort($produkTampil, function ($a, $b) { return $a['harga'] <=> $b['harga']; });
        break;
    case 'price-desc':
        usort($produkTampil, function ($a, $b) { return $b['harga'] <=> $a['harga']; });
        break;
    case 'name-asc':
        usort($produkTampil, function ($a, $b) { return strcasecmp($a['nama'], $b['nama']); });
        break;
    default:
        // 'popular' -> biarkan urutan aslinya
        break;
}

// Kartu "New Edition (Coming soon)" hanya muncul saat kategori All / New Edition,
// dan tidak sedang dalam mode pencarian. Selalu diletakkan paling akhir.
if ($keyword === '' && ($kategoriAktif === 'all' || $kategoriAktif === 'new-edition')) {
    $produkTampil = array_merge($produkTampil, array_values($produkComingSoon));
}

$jumlahProduk = count($produkTampil);

require __DIR__ . '/includes/header.php';
?>

<section class="catalogue-hero">
    <h1>Catalogue</h1>
</section>

<div class="container">
    <div class="catalogue-layout">

        <!-- ============ SIDEBAR FILTER ============ -->
        <aside class="filter-sidebar">
            <p class="filter-heading">Filter</p>

            <div class="filter-group">
                <h3>By Category</h3>
                <div class="filter-pills">
                    <?php foreach ($kategoriList as $slug => $label):
                        $queryParams = $_GET;
                        $queryParams['kategori'] = $slug;
                        unset($queryParams['sort']); // mulai lagi dari "Most Popular" tiap ganti kategori
                    ?>
                        <a href="catalogue.php?<?php echo htmlspecialchars(http_build_query($queryParams)); ?>"
                           class="filter-pill <?php echo $kategoriAktif === $slug ? 'is-active' : ''; ?>">
                            <?php echo htmlspecialchars($label); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="filter-group">
                <h3>Price Range</h3>
                <p class="price-range-note">Rp.35.000 - Rp.200.000</p>
                <div class="price-range-bar">
                    <div class="price-range-bar__fill"></div>
                    <span class="price-range-bar__handle price-range-bar__handle--start"></span>
                    <span class="price-range-bar__handle price-range-bar__handle--end"></span>
                </div>
                <p class="filter-note">*Geser harga akan aktif setelah fitur JavaScript ditambahkan</p>
            </div>

            <div class="filter-group">
                <h3>Material</h3>
                <div class="filter-pills">
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Heavy Terry</span>
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Ripstop</span>
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Micro-Twill</span>
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Combed Cotton</span>
                </div>
            </div>

            <div class="filter-group">
                <h3>Availability</h3>
                <div class="filter-pills">
                    <span class="filter-pill filter-pill--static is-active" title="Segera aktif">In Stock</span>
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Pre-Order</span>
                    <span class="filter-pill filter-pill--static" title="Segera aktif">Limited Edition</span>
                </div>
            </div>
        </aside>

        <!-- ============ KONTEN PRODUK ============ -->
        <div class="catalogue-content">
            <div class="section-head">
                <h2 class="section-title" style="margin-bottom:0;">All Products</h2>

                <div class="section-head__meta">
                    <span>
                        Showing <?php echo (int) $jumlahProduk; ?> Styles
                        <?php if ($keyword !== ''): ?>
                            untuk "<?php echo htmlspecialchars($keyword); ?>"
                        <?php endif; ?>
                    </span>

                    <form class="sort-form" method="get" action="catalogue.php">
                        <?php if ($kategoriAktif !== 'all'): ?>
                            <input type="hidden" name="kategori" value="<?php echo htmlspecialchars($kategoriAktif); ?>">
                        <?php endif; ?>
                        <?php if ($keyword !== ''): ?>
                            <input type="hidden" name="q" value="<?php echo htmlspecialchars($keyword); ?>">
                        <?php endif; ?>
                        <span class="sort-pill">
                            <select name="sort" class="sort-select">
                                <?php foreach ($sortList as $value => $label): ?>
                                    <option value="<?php echo htmlspecialchars($value); ?>"
                                        <?php echo $sortAktif === $value ? 'selected' : ''; ?>>
                                        Sort by : <?php echo htmlspecialchars($label); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="sort-btn" title="Terapkan urutan">&#9662;</button>
                        </span>
                    </form>
                </div>
            </div>

            <div class="product-grid">
                <?php if ($jumlahProduk === 0): ?>
                    <p class="empty-state">
                        Produk tidak ditemukan. Coba ubah kategori atau kata kunci pencarian.
                    </p>
                <?php endif; ?>

                <?php foreach ($produkTampil as $produk): ?>
                    <?php if ($produk['harga'] === null): ?>
                        <!-- Kartu khusus "New Edition - Coming soon" (tanpa gambar/harga) -->
                        <div class="product-card product-card--empty">
                            <p class="product-card__title"><?php echo htmlspecialchars($produk['nama']); ?></p>
                            <p class="product-card__price">Coming soon</p>
                        </div>
                    <?php else: ?>
                        <a href="product-detail.php?slug=<?php echo urlencode($produk['slug']); ?>" class="product-card">
                            <div class="product-card__media">
                                <span class="product-card__wishlist">&#9825;</span>
                                <img src="<?php echo htmlspecialchars($produk['gambar']); ?>"
                                     alt="<?php echo htmlspecialchars($produk['nama']); ?>">
                            </div>
                            <div class="product-card__body">
                                <div>
                                    <p class="product-card__title"><?php echo htmlspecialchars($produk['nama']); ?></p>
                                    <p class="product-card__price"><?php echo format_rupiah($produk['harga']); ?></p>
                                </div>
                                <span class="product-card__add">+</span>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div style="height:56px;"></div>

<?php require __DIR__ . '/includes/footer.php'; ?>
