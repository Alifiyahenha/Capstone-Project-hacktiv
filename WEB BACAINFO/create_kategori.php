<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Escape input untuk keamanan
  $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

  // Ambil nilai ID terbesar saat ini
  $result = mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM category");
  $data = mysqli_fetch_assoc($result);
  $new_id = ($data['max_id'] ?? 0) + 1;

  // Simpan data dengan ID manual
  $simpan = mysqli_query($koneksi, "INSERT INTO category (id, nama, description) VALUES ($new_id, '$nama', '$deskripsi')");

  if ($simpan) {
    header("Location: admin_dashboard.php");
    exit;
  } else {
    echo "Gagal menambah kategori: " . mysqli_error($koneksi);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Kategori</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 30px;
    }
  </style>
</head>
<body class="p-4">
  <div class="container">
    <h2>Tambah Kategori Baru</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
