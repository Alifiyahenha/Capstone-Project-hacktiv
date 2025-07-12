<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nickname'])) {
    header("Location: login.php");
    exit();
}

$namaPenulis = $_SESSION['nickname'];

// Ambil ID penulis dari nickname
$getAuthor = mysqli_query($koneksi, "SELECT id FROM author WHERE nickname = '$namaPenulis'");
$dataAuthor = mysqli_fetch_assoc($getAuthor);
$authorId = $dataAuthor['id'] ?? 0;

// Handle delete
if (isset($_GET['hapus'])) {
  $id = intval($_GET['hapus']);

  // Ambil nama file gambar
  $getGambar = mysqli_query($koneksi, "SELECT picture FROM article WHERE id = $id");
  $dataGambar = mysqli_fetch_assoc($getGambar);

  if (!empty($dataGambar['picture'])) {
    $filePath = 'img/' . $dataGambar['picture'];
    if (file_exists($filePath)) {
      unlink($filePath);
    }
  }

  // Hapus relasi
  mysqli_query($koneksi, "DELETE FROM article_category WHERE article_id = $id");
  mysqli_query($koneksi, "DELETE FROM article_author WHERE article_id = $id");

  // Hapus artikel
  mysqli_query($koneksi, "DELETE FROM article WHERE id = $id");

  header("Location: artikel.php");
  exit();
}

// Query hanya artikel milik user
$query = "
SELECT 
    a.id,
    a.date,
    a.title,
    a.content,
    a.picture,
    au.nickname AS author,
    k.nama AS category
FROM article a
LEFT JOIN article_author aa ON a.id = aa.article_id
LEFT JOIN author au ON aa.author_id = au.id
LEFT JOIN article_category ac ON a.id = ac.article_id
LEFT JOIN category k ON ac.category_id = k.id
WHERE aa.author_id = $authorId
ORDER BY a.date DESC
";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Artikel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
  body {
  font-family: 'Fredoka', sans-serif;
  }
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Poppins', sans-serif;
    }

    .background-wrapper {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      z-index: -1;
    }

    .background-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .overlay {
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(6px);
      min-height: 100vh;
      padding: 50px 20px;
    }

    .card-article {
      background-color: #ffffffdd;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      padding: 30px;
    }

    table {
      border-collapse: separate;
      border-spacing: 0;
      overflow: hidden;
      border-radius: 15px;
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

    .thumb {
      width: 100px;
      height: auto;
      border-radius: 5px;
    }

    .btn-warning {
      background-color: #f1c40f;
      color: black;
    }

    .btn-danger {
      background-color: #e74c3c;
    }

    h2 {
      font-weight: bold;
      color: #2c3e50;
    }

    p {
      font-size: 1.1rem;
      color: #34495e;
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


  </style>
</head>
<body>
  <div class="background-wrapper">
    <img src="img/bgkategori.jpg" alt="Background">
  </div>

  <div class="overlay">
    <div class="container card-article">
      <a href="index.php" class="home-button" title="Kembali ke Beranda">
    <i class="fas fa-home"></i>
  </a>

      <h2 class="mb-4">📝 Daftar Artikel Kamu</h2>
      <p>Halo, <strong><?= htmlspecialchars($namaPenulis); ?></strong>! Berikut artikel-artikel yang kamu tulis:</p>

      <table class="table table-bordered mt-4">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Penulis</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['date']; ?></td>
              <td><?= htmlspecialchars($row['title']); ?></td>
              <td><?= substr(strip_tags($row['content']), 0, 100) ?>...</td>
              <td><?= htmlspecialchars($row['author'] ?? '-'); ?></td>
              <td>
                <?php if (!empty($row['picture'])): ?>
                  <img src="img/<?= htmlspecialchars($row['picture']); ?>" class="thumb">
                <?php else: ?>
                  Tidak ada gambar
                <?php endif; ?>
              </td>
              <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm mb-1">Edit</a>
                <a href="artikel.php?hapus=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>
</body>
</html>