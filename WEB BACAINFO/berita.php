<?php
session_start();
include("koneksi.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil detail artikel
$sql = "SELECT a.id, a.date, a.title, a.content, a.picture,
               au.nickname AS author_name, c.nama AS category_nama
        FROM article a
        LEFT JOIN article_author aa ON a.id = aa.article_id
        LEFT JOIN author au ON aa.author_id = au.id
        LEFT JOIN article_category ac ON a.id = ac.article_id
        LEFT JOIN category c ON ac.category_id = c.id
        WHERE a.id = $id
        LIMIT 1";
$result = mysqli_query($koneksi, $sql);
$article = mysqli_fetch_assoc($result);

// Ambil rekomendasi dan simpan di array
$rekomendasiSql = "SELECT id, title, picture FROM article WHERE id != $id ORDER BY RAND() LIMIT 3";
$rekomendasiResult = mysqli_query($koneksi, $rekomendasiSql);
$rekomendasiList = [];
while($row = mysqli_fetch_assoc($rekomendasiResult)) {
    $rekomendasiList[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($article['title']) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
    font-family: 'Fredoka', sans-serif;
    }
  
    body {
      background-image: url('img/bgtkategori.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      font-family: 'Poppins', sans-serif;
      padding-top: 4rem;
    }

    .background-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      filter: blur(20px);
      transform: scale(1.1);
    }

    .card-main {
      background: rgba(255, 255, 255, 0.18);
      border-radius: 24px;
      padding: 2rem;
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
      color: #222;
      transition: all 0.3s ease;
    }

    .card-main:hover {
      transform: scale(1.01);
    }

    .card-rekom {
      background: rgba(255, 255, 255, 0.22);
      backdrop-filter: blur(20px);
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease;
      color: #111;
    }

    .card-rekom:hover {
      transform: translateY(-5px);
    }

    .card-title {
      font-weight: 700;
      color: #1e1e1e;
    }

    .card-text {
      color: #2b2b2b;
      line-height: 1.7;
    }

    .btn-kembali {
      margin-top: 1.5rem;
    }

    h4 {
      font-weight: 600;
      margin-top: 3rem;
      color: #1d1d1d;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand font-weight-bold" href="index.php">Bacainfo</a>
      <div class="ml-auto">
        <a href="index.php" class="nav-link d-inline">Home</a>
        <a href="kategori.php" class="nav-link d-inline">Kategori</a>
        <a href="login.php" class="nav-link d-inline">Login</a>
      </div>
    </div>
  </nav>

  <!-- Background -->
  <div class="background-wrapper">
    <img src="img/bgkategori.jpg" alt="Background Gambar">
  </div>

  <!-- Konten -->
  <div class="container mt-5 pt-5">
    <div class="row">
      <!-- Detail Artikel -->
      <div class="col-md-8">
        <div class="card card-main mb-4">
          <h2 class="card-title"><?= htmlspecialchars($article['title']) ?></h2>
          <p style="color: #000;">
            <strong>Kategori:</strong> <?= htmlspecialchars($article['category_nama'] ?? 'Tidak diketahui'); ?> |
            <?= htmlspecialchars($article['author_name'] ?? 'Anonim'); ?> |
            <?= htmlspecialchars($article['date']); ?>
          </p>
          <img src="img/<?= htmlspecialchars($article['picture']); ?>" class="img-fluid rounded mb-4" alt="Gambar Artikel" style="max-height: 400px; object-fit: cover; width: 100%;">
          <div class="card-text"><?= $article['content']; ?></div>
          <a href="index.php" class="btn btn-outline-dark btn-kembali">← Kembali ke Beranda</a>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4">
        <!-- Pencarian -->
        <div class="card card-rekom mb-4 p-3">
          <h5>Pencarian</h5>
          <form action="search.php" method="GET">
            <input type="text" name="keyword" class="form-control" placeholder="Cari artikel...">
          </form>
        </div>

        <!-- Artikel Terkait -->
        <div class="card card-rekom p-3">
          <h5>Artikel Terkait</h5>
          <ul class="list-unstyled">
            <?php foreach($rekomendasiList as $rekom): ?>
              <li class="mb-2">
                <a href="berita.php?id=<?= $rekom['id']; ?>" class="text-dark">
                  <?= htmlspecialchars($rekom['title']); ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Rekomendasi Berita -->
    <h4>Rekomendasi Berita Lainnya</h4>
    <div class="row mt-4">
      <?php foreach($rekomendasiList as $rekom): ?>
        <div class="col-md-4 mb-3">
          <div class="card card-rekom h-100 shadow-sm">
            <img src="img/<?= htmlspecialchars($rekom['picture']); ?>" class="card-img-top rounded-top" style="height: 180px; object-fit: cover;" alt="<?= htmlspecialchars($rekom['title']); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($rekom['title']); ?></h5>
              <a href="berita.php?id=<?= $rekom['id']; ?>" class="btn btn-sm btn-outline-dark">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted">
      &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
    </footer>
  </div>
</body>
</html>
