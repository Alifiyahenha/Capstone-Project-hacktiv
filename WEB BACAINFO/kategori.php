<?php
session_start();
include 'koneksi.php';
$kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Artikel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Font & External CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="emm.css?v=2">

  <style>
    body {
      font-family: 'Fredoka', sans-serif;
      margin: 0;
      padding: 0;
    }

    .background-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -2;
    }

    .overlay {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(10px);
      min-height: 100vh;
      padding-top: 90px;
      position: relative;
      z-index: 1;
    }

    .fixed-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: white;
      z-index: 1000;
      padding: 10px 20px;
      border-bottom: 1px solid #ddd;
    }

    .article-card.horizontal {
      display: flex;
      flex-direction: row;
      background: rgba(255,255,255,0.1);
      padding: 15px;
      border-radius: 12px;
      gap: 16px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      transition: transform 0.3s ease;
    }

    .article-card.horizontal:hover {
      transform: scale(1.01);
    }

    .article-card.horizontal img {
      width: 250px;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }

    a.text-dark:hover {
      color: #6c63ff;
    }

    .btn-light:hover {
  background-color: #6c63ff !important;
  color: white !important;
}

  </style>
</head>
<body>

<?php if (isset($_SESSION['nickname'])): ?>
  <a href="index.php" class="btn btn-light shadow-sm rounded-circle d-flex justify-content-center align-items-center"
     style="position: fixed; top: 90px; left: 20px; width: 48px; height: 48px; z-index: 1050;">
    <i class="bi bi-house-door-fill" style="font-size: 20px;"></i>
  </a>
<?php endif; ?>

<!-- Background -->
<div class="background-wrapper">
  <img src="img/bgkategori.jpg" alt="Background">
</div>

<!-- Navbar -->
<div class="fixed-navbar d-flex justify-content-end align-items-center pr-4">
  <?php if (isset($_SESSION['nickname'])): ?>
    <span class="badge badge-pill badge-light d-flex align-items-center" style="font-weight: 500; font-size: 15px;">
      <i class="bi bi-person-circle mr-2" style="font-size: 18px;"></i> 
      Halo, <?= htmlspecialchars($_SESSION['nickname']); ?>
    </span>
  <?php endif; ?>
  <div class="dropdown ml-3">
    <button class="btn shadow-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:rgb(184, 119, 204); border-radius: 50%; font-size: 24px; width: 40px; height: 40px;">
      &#8942;
    </button>
    <div class="dropdown-menu dropdown-menu-right">
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
        <a class="dropdown-item" href="admin_dashboard.php"><i class="bi bi-tools mr-2"></i> Admin Panel</a>
      <?php endif; ?>
      <a class="dropdown-item" href="index.php"><i class="bi bi-house-door-fill mr-2"></i> Beranda</a>
      <a class="dropdown-item" href="kategori.php"><i class="bi bi-grid-fill mr-2"></i> Kategori</a>
      <?php if (isset($_SESSION['nickname'])): ?>
        <a class="dropdown-item" href="artikel.php"><i class="bi bi-journal-text mr-2"></i> Artikel</a>
        <a class="dropdown-item" href="tulis_artikel.php"><i class="bi bi-pencil-square mr-2"></i> Tulis Artikel</a>
        <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
      <?php else: ?>
        <a class="dropdown-item" href="login.php"><i class="bi bi-box-arrow-in-right mr-2"></i> Login</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Overlay Content -->
<div class="overlay">
  <div class="container">
    <?php if (!$kategori): ?>
      <div class="text-center py-5">
        <h2 class="mb-4">🗂 Pilih Kategori</h2>
        <div class="d-flex flex-wrap justify-content-center">
          <?php
          $result = mysqli_query($koneksi, "SELECT * FROM category ORDER BY nama ASC");
          while($row = mysqli_fetch_assoc($result)):
          ?>
            <a href="kategori.php?kategori=<?= urlencode($row['nama']) ?>" class="btn btn-outline-dark m-2 px-4 py-2 rounded-pill">
              <?= htmlspecialchars($row['nama']) ?>
            </a>
          <?php endwhile; ?>
        </div>
      </div>
    <?php else: ?>
      <h3 class="text-center mb-5">Kategori: <?= htmlspecialchars($kategori) ?></h3>
      <div class="row">
        <?php
        $query = "
          SELECT a.id, a.title, a.content, a.picture, a.date,
                 au.nickname AS author
          FROM article a
          LEFT JOIN article_category ac ON a.id = ac.article_id
          LEFT JOIN category k ON ac.category_id = k.id
          LEFT JOIN article_author aa ON a.id = aa.article_id
          LEFT JOIN author au ON aa.author_id = au.id
          WHERE k.nama = '$kategori'
          ORDER BY a.date DESC
        ";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) > 0):
          while ($row = mysqli_fetch_assoc($result)):
            $excerpt = implode(" ", array_slice(explode(" ", strip_tags($row["content"])), 0, 20));
            $img = !empty($row['picture']) ? 'img/' . $row['picture'] : 'img/default.jpg';
        ?>
          <div class="col-md-12 mb-4">
            <div class="article-card horizontal">
              <img src="<?= $img ?>" alt="Gambar Artikel">
              <div class="pl-3 d-flex flex-column justify-content-between">
                <div>
                  <h5>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="text-dark font-weight-bold" style="text-decoration: none;">
                      <?= htmlspecialchars($row['title']) ?>
                    </a>
                  </h5>
                  <p class="text-muted small mb-2"><?= $excerpt ?>...</p>
                </div>
                <div class="text-muted small">
                  ✍ <?= $row['author'] ?? '-' ?> | 📅 <?= date('d M Y', strtotime($row['date'])) ?>
                </div>
              </div>
            </div>
          </div>
        <?php
          endwhile;
        else:
          echo "<p class='text-center'>Tidak ada artikel dalam kategori ini.</p>";
        endif;
        ?>
      </div>
      <div class="text-center mt-4">
        <a href="kategori.php" class="btn btn-dark">← Pilih Kategori Lain</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>

</body>
</html>
