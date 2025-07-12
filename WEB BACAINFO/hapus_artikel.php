<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil nama gambar
    $query_gambar = $koneksi->query("SELECT picture FROM article WHERE id = $id");
    $data_gambar = $query_gambar->fetch_assoc();

    if ($data_gambar && !empty($data_gambar['picture'])) {
        $gambar_path = 'img/' . $data_gambar['picture'];
        if (file_exists($gambar_path)) {
            unlink($gambar_path);
        }
    }

    // Hapus relasi dari tabel article_author terlebih dahulu
    $koneksi->query("DELETE FROM article_author WHERE article_id = $id");

    // Baru hapus artikel
    $query = $koneksi->query("DELETE FROM article WHERE id = $id");

    if ($query) {
        echo "<script>alert('Artikel berhasil dihapus'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus artikel'); window.location='admin_dashboard.php';</script>";
    }

} else {
    echo "<script>alert('ID artikel tidak ditemukan'); window.location='admin_dashboard.php';</script>";
}
?>
