<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Hapus relasi dulu (jika ada)
mysqli_query($koneksi, "DELETE FROM article_author WHERE author_id = $id");

// Hapus data penulis
$hapus = mysqli_query($koneksi, "DELETE FROM author WHERE id = $id");

if ($hapus) {
  header("Location: admin_dashboard.php");
  exit;
} else {
  echo "Gagal menghapus data penulis.";
}
?>
