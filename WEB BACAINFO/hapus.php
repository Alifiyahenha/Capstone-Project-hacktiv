<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dbcms");

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    die("Akses tidak diizinkan!");
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Cek author artikel
$cek = $conn->query("SELECT author_id FROM article_author WHERE article_id = $id");
$data = $cek->fetch_assoc();

if (!$data) {
    die("Artikel tidak ditemukan!");
}

// Hanya admin atau author yang berhak
if ($role === 'admin' || $data['author_id'] == $user_id) {
    // Hapus relasi sebelum artikel
    $conn->query("DELETE FROM article_author WHERE article_id = $id");
    $conn->query("DELETE FROM article_category WHERE article_id = $id");
    $hapus = $conn->query("DELETE FROM article WHERE id = $id");

    if ($hapus) {
        $redirect = $role === 'admin' ? 'admin_dashboard.php' : 'artikel.php';
        header("Location: $redirect");
        exit;
    } else {
        echo "Gagal menghapus artikel: " . $conn->error;
    }
} else {
    echo "Kamu tidak diizinkan menghapus artikel ini.";
}

$conn->close();
?>
