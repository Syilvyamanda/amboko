<?php
/**
 * includes/header.php
 * Navbar global (Home, Catalogue, search, cart, akun).
 * Variable $activePage dikirim dari tiap halaman untuk menandai menu aktif.
 * Tahap 1: murni tampilan, belum terhubung ke database / session.
 */
if (!isset($activePage)) {
    $activePage = '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - AMBOKO' : 'AMBOKO'; ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $baseUrl ?? ''; ?>assets/css/style.css">
</head>
<body>

<header class="navbar">
    <a href="<?php echo $baseUrl ?? ''; ?>index.php" class="navbar__logo">
        <img src="<?php echo $baseUrl ?? ''; ?>assets/img/logo.png" alt="AMBOKO">
    </a>

    <nav class="navbar__menu">
        <a href="<?php echo $baseUrl ?? ''; ?>index.php" class="<?php echo $activePage === 'home' ? 'active' : ''; ?>">Home</a>
        <a href="<?php echo $baseUrl ?? ''; ?>catalogue.php" class="<?php echo $activePage === 'catalogue' ? 'active' : ''; ?>">Catalogue</a>
    </nav>

    <div class="navbar__right">
        <form class="navbar__search" action="<?php echo $baseUrl ?? ''; ?>catalogue.php" method="get">
            <span class="icon-muted">&#128269;</span>
            <input type="text" name="q" placeholder="Cari produk...">
        </form>
        <a href="#" class="icon-btn" title="Keranjang">&#128092;</a>
        <a href="#" class="icon-btn outline" title="Akun">&#128100;</a>
    </div>
</header>
