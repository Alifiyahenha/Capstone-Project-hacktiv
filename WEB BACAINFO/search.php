<?php
include("koneksi.php");
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : '';
$query = "SELECT * FROM article WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
$hasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Pencarian</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Fredoka', sans-serif;
      background-color: #f5f6ff;
      background-image: url('img/bgkategori.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: center;
    }
    .background-wrapper img {
      filter: blur(10px);
      transform: scale(1.1);
    }
    .card {
      border-radius: 20px;
      background-color: #fff;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }
    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }
    .card img {
      height: 100%;
      object-fit: cover;
      border-radius: 0 0 0 20px;
    }
    .card-body {
      padding: 1rem;
      background-color: #fff;
      border-radius: 0 20px 20px 0;
    }
    .card-title {
      font-weight: bold;
      color: #333;
    }
    .card-text {
      color: #555;
    }
    .home-button {
      position: fixed;
      top: 20px;
      left: 20px;
      font-size: 24px;
      color: #fff;
      background-color: rgba(0, 0, 0, 0.72);
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
<a href="index.php" class="home-button" title="Kembali ke Beranda">
  <i class="fas fa-home"></i>
</a>

<header class="text-center py-2 bg-light shadow-sm">
  <h4 class="font-weight-bold mb-0">Bacainfo - Hasil Pencarian</h4>
  <div class="container mt-3 d-flex justify-content-end">
    <form action="search.php" method="GET" class="form-inline">
      <input type="text" name="keyword" class="form-control mr-2" value="<?= htmlspecialchars($keyword); ?>" placeholder="Cari artikel...">
      <button type="submit" class="btn btn-dark shadow-sm">
        <i class="fas fa-search" style="color: white;"></i>
      </button>
    </form>
  </div>
</header>

<div class="container py-5 text-center text-black">
  <h2 class="fw-bold mb-3">Hasil untuk: "<?= htmlspecialchars($keyword); ?>"</h2>
  <a href="kategori.php" class="btn btn-dark shadow mb-5">← Kembali ke Kategori</a>

  <div class="row">
    <?php if (mysqli_num_rows($hasil) > 0): ?>
      <?php while($row = mysqli_fetch_assoc($hasil)): ?>
        <div class="col-md-6 mb-4 d-flex">
          <div class="card shadow border-0 w-100 h-100">
            <div class="row no-gutters">
              <div class="col-4">
                <img src="img/<?= htmlspecialchars($row['picture']) ?>" class="img-fluid rounded-start" alt="<?= htmlspecialchars($row['title']) ?>" style="height:100%; width:100%; object-fit:cover; border-radius:20px 0 0 20px;">
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="berita.php?id=<?= $row['id'] ?>" class="text-dark" style="text-decoration: none;">
                      <?= htmlspecialchars($row['title']) ?>
                    </a>
                  </h5>
                  <p class="card-text">
                    <?= substr(strip_tags($row['content']), 0, 100) ?>...
                  </p>
                  <p class="card-text">
                    <small class="text-muted">
                      📅 <?= date('d M Y', strtotime($row['date'])) ?>
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12">
        <p class='text-muted'>Tidak ditemukan artikel yang sesuai.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>
</body>
</html>
