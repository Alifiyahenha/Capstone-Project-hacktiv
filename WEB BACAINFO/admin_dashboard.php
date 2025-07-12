<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">


  <style>
  body {
  font-family: 'Fredoka', sans-serif;
  }

    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    .background-wrapper {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: -1;
    }

    .background-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(10px);
      transform: scale(1.1);
    }

    .overlay {
      background: rgba(255,255,255,0.4);
      backdrop-filter: blur(8px);
      min-height: 100vh;
      padding: 60px 20px;
    }

    .btn-nav {
      margin: 10px 10px 30px 0;
      border-radius: 30px;
      font-weight: bold;
      padding: 10px 25px;
      font-size: 16px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .btn-penulis { background-color: #007bff; color: white; }
    .btn-kategori { background-color: #28a745; color: white; }
    .btn-artikel { background-color: #17a2b8; color: white; }

    .card-dashboard {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      padding: 30px;
      display: none;
    }

    .card-dashboard.active {
      display: block;
    }

    table {
      border-radius: 15px;
      overflow: hidden;
    }

    th {
      background-color: #6c5ce7;
      color: white;
      text-align: center;
    }

    td {
      background-color: #f9f9f9;
    }

    tr:hover td {
      background-color: #eef2ff;
    }

    .btn-warning {
      background-color: #f1c40f;
      color: black;
      border: none;
    }

    .btn-danger {
      background-color: #e74c3c;
      border: none;
    }

    .home-button {
      position: fixed;
      top: 20px;
      left: 20px;
      font-size: 24px;
      color: #fff;
      background-color: #6c5ce7;
      padding: 12px;
      border-radius: 50%;
      text-align: center;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      transition: background-color 0.3s, transform 0.2s;
    }

    .home-button:hover {
      background-color: #a29bfe;
      transform: scale(1.1);
    }

    h2, h4 {
      font-weight: bold;
      color: #2c3e50;
    }
  </style>
</head>
<body>

<a href="index.php" class="home-button" title="Kembali ke Beranda">
  <i class="fas fa-home"></i>
</a>

<div class="background-wrapper">
  <img src="img/bgkategori.jpg" alt="Background">
</div>

<div class="overlay container">
  <h2 class="mb-4">Dashboard Admin</h2>

  <!-- Navigasi Tombol -->
  <div class="text-center mb-4">
    <button class="btn btn-nav btn-penulis" onclick="showSection('penulis')">👤 Penulis</button>
    <button class="btn btn-nav btn-kategori" onclick="showSection('kategori')">🏷️ Kategori</button>
    <button class="btn btn-nav btn-artikel" onclick="showSection('artikel')">📄 Artikel</button>
  </div>

  <!-- CARD PENULIS -->
  <div id="penulis" class="card-dashboard active">
    <h4>Data Penulis</h4>
    <table class="table table-bordered">
      <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php
        $result = $koneksi->query("SELECT id, nickname, email FROM author");
        while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nickname']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
              <a href="edit_author.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete_author.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus penulis ini?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- CARD KATEGORI -->
  <div id="kategori" class="card-dashboard">
    <a href="create_kategori.php" class="btn btn-success mb-3">+ Tambah Kategori</a>
    <h4>Data Kategori</h4>
    <table class="table table-bordered">
      <thead><tr><th>ID</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php
        $result = $koneksi->query("SELECT id, nama, description FROM category");
        while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['description'] ?? '') ?></td>
            <td>
              <a href="edit_kategori.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="delete_kategoriphp?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">Delete</a>
              
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

 <!-- CARD ARTIKEL -->
<div id="artikel" class="card-dashboard">
  <h4>Data Artikel</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $koneksi->query("SELECT id, date, title, picture FROM article");
      while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td>
            <?php if (!empty($row['picture'])): ?>
              <img src="img/<?= htmlspecialchars($row['picture']) ?>" alt="Gambar Artikel" style="max-height: 80px;">
            <?php else: ?>
              <span class="text-muted">Tidak ada gambar</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="edit_artikel.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="hapus_artikel.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus artikel ini?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>


<script>
  function showSection(id) {
    document.querySelectorAll('.card-dashboard').forEach(el => el.classList.remove('active'));
    document.getElementById(id).classList.add('active');
  }
</script>

</body>
</html>
