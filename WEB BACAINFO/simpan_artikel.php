<?php
session_start();
include 'koneksi.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$title = mysqli_real_escape_string($koneksi, $_POST['title']);
$content = mysqli_real_escape_string($koneksi, $_POST['content']);
$category_id = (int) $_POST['category_id'];
$author_id = (int) $_SESSION['user_id']; // pastikan integer

// Proses upload gambar
$gambarPath = '';
if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $namaFile = basename($_FILES['picture']['name']);
    $uploadPath = 'img/' . $namaFile;

    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($ext, $allowed_ext)) {
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath)) {
            $gambarPath = $namaFile;
        }
    }
}

// Simpan ke tabel article
mysqli_query($koneksi, "
    INSERT INTO article (title, content, date, picture)
    VALUES ('$title', '$content', NOW(), '$gambarPath')
");

$article_id = mysqli_insert_id($koneksi);

// Simpan ke tabel kategori
mysqli_query($koneksi, "
    INSERT INTO article_category (article_id, category_id)
    VALUES ('$article_id', '$category_id')
");

// Simpan ke tabel author
mysqli_query($koneksi, "
    INSERT INTO article_author (article_id, author_id)
    VALUES ('$article_id', '$author_id')
");

// Redirect ke halaman daftar_artikel
header("Location: daftar_artikel.php?success=1");
exit;
?>
