<?php
include 'koneksi.php';

// Ambil ID dan pastikan dalam bentuk angka
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cek apakah ID valid
if ($id > 0) {
  // Hapus relasi terlebih dahulu
  $hapus_relasi = mysqli_query($koneksi, "DELETE FROM article_category WHERE category_id = $id");

  // Lanjut hapus kategori utama
  $hapus_kategori = mysqli_query($koneksi, "DELETE FROM category WHERE id = $id");

  if ($hapus_kategori) {
    header("Location: admin_dashboard.php");
    exit;
  } else {
    echo "Gagal menghapus kategori: " . mysqli_error($koneksi);
  }
} else {
  echo "ID kategori tidak valid.";
}
?>
