<?php
/**
 * includes/functions.php
 * Kumpulan fungsi bantu yang dipakai di banyak halaman.
 * Tahap 1: baru format harga. Nanti (Tahap 4) akan ditambah
 * fungsi query ke database di sini juga.
 */

/**
 * Format angka menjadi format Rupiah ala desain: "Rp.120.000"
 */
function format_rupiah($number)
{
    return 'Rp.' . number_format((float) $number, 0, ',', '.');
}
