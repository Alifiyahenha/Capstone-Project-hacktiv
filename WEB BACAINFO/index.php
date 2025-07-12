  <?php
  session_start();
  include("koneksi.php"); 
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Bacainfo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="emm.css?v=2">

    <style>
      html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        scroll-behavior: smooth;
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

      .main-navbar {
        margin-top: 10px;
      }

      .article-card.horizontal {
        display: flex;
        flex-direction: row;
        align-items: stretch;
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
    </style>
  </head>
  <body>

 <!-- Background -->
<div class="background-wrapper">
  <img src="img/bgkategori.jpg" alt="Background">
</div>

<div class="overlay">

<div class="fixed-navbar d-flex justify-content-between align-items-center px-4" style="background: rgba(255,255,255,0.8); backdrop-filter: blur(10px); height: 60px; z-index: 1000;">
<div class="font-weight-bold" style="font-size: 22px; color: #333;">
    Bacainfo
  </div>

  <div class="d-flex flex-wrap justify-content-center align-items-center">
    <?php
    $kategori_nav = mysqli_query($koneksi, "SELECT * FROM category ORDER BY nama ASC");
    while ($k = mysqli_fetch_assoc($kategori_nav)) {
      echo '<a href="kategori.php?kategori=' . urlencode($k['nama']) . '" class="nav-link text-dark px-2">' . htmlspecialchars($k['nama']) . '</a>';
    }
    ?>
  </div>

  <div class="d-flex align-items-center">
    <?php if (isset($_SESSION['nickname'])): ?>
      <span class="badge badge-pill badge-light d-flex align-items-center mr-2" style="font-weight: 500; font-size: 14px;">
        <i class="bi bi-person-circle mr-1" style="font-size: 16px;"></i> 
        <?= htmlspecialchars($_SESSION['nickname']); ?>
      </span>
    <?php endif; ?>

    <div class="dropdown">
      <button class="btn btn-sm shadow-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        style="background-color:rgb(184, 119, 204); border: 1px solid #ccc; border-radius: 50%; font-size: 20px; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
        &#8942;
      </button>
      <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="dropdownMenuButton">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <a class="dropdown-item d-flex align-items-center" href="admin_dashboard.php"><i class="bi bi-tools mr-2"></i> Admin Panel</a>
        <?php endif; ?>
        <a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-house-door-fill mr-2"></i> Dashboard</a>
        <a class="dropdown-item d-flex align-items-center" href="kategori.php"><i class="bi bi-grid-fill mr-2"></i> Kategori</a>
        <?php if (isset($_SESSION['nickname'])): ?>
          <a class="dropdown-item d-flex align-items-center" href="artikel.php"><i class="bi bi-journal-text mr-2"></i> Artikel</a>
          <a class="dropdown-item d-flex align-items-center" href="tulis_artikel.php"><i class="bi bi-pencil-square mr-2"></i> Mulai Menulis</a>
          <a class="dropdown-item d-flex align-items-center" href="logout.php"><i class="bi bi-box-arrow-right mr-2"></i> Log Out</a>
        <?php else: ?>
          <a class="dropdown-item d-flex align-items-center" href="login.php"><i class="bi bi-box-arrow-in-right mr-2"></i> Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

  <!-- Hero Section -->
 <section class="hero-section text-dark text-center py-5" style="background-color: transparent; font-family: 'Fredoka', sans-serif;">
  <div class="container hero-content">
    <h1 class="display-4 font-weight-bold" style="font-weight: 600;">Selamat Datang di Bacainfo<br>Baca yang Kamu Suka, Kapan Saja.</h1>
    <p class="lead mt-3" style="font-size: 1.25rem;">Dari gaya hidup, kesehatan, teknologi, hingga inspirasi hidup—semua ada di sini..</p>
    <a href="#start-reading-section" class="btn btn-dark mt-4" style="padding: 0.75rem 2rem; font-size: 1rem;">Start Reading</a>
  </div>
</section>

<?php
$deskripsiKategori = "Website Bacainfo menyajikan artikel dari berbagai kategori populer seperti gaya hidup, kesehatan, teknologi, dan traveling.";
if (isset($_GET['kategori'])) {
  $namaKategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
  $queryKategori = mysqli_query($koneksi, "SELECT deskripsi FROM category WHERE nama = '$namaKategori'");
  if ($resultKategori = mysqli_fetch_assoc($queryKategori)) {
    $deskripsiKategori = $resultKategori['deskripsi'] ?: "Belum ada deskripsi untuk kategori ini.";
  }
}
?>

  <!-- Artikel Section -->
  <div class="container mt-5">
    <div class="row" id="start-reading-section">
      <!-- Artikel KIRI -->
      <div class="col-md-8">
        <?php
        $sql = "SELECT a.*, 
                GROUP_CONCAT(DISTINCT au.nickname SEPARATOR ', ') AS author, 
                GROUP_CONCAT(DISTINCT c.nama SEPARATOR ', ') AS category
                FROM article a
                LEFT JOIN article_author aa ON a.id = aa.article_id
                LEFT JOIN author au ON aa.author_id = au.id
                LEFT JOIN article_category ac ON a.id = ac.article_id
                LEFT JOIN category c ON ac.category_id = c.id
                GROUP BY a.id
                ORDER BY a.date DESC
                LIMIT 7";

        $hasil = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($hasil) > 0) {
          while ($row = mysqli_fetch_assoc($hasil)) {
            $wordLimit = 20;
            $words = explode(" ", strip_tags($row["content"]));
            $artikel = implode(" ", array_slice($words, 0, $wordLimit));
            $image = !empty($row['picture']) ? 'img/' . $row['picture'] : 'img/default.jpg';
        ?>
        <div class="article-card horizontal mb-4">
          <img src="<?= $image ?>" alt="Gambar Artikel">
          <div class="pl-3 d-flex flex-column justify-content-between">
            <div>
              <h5 class="mb-2">
                <a href="berita.php?id=<?= $row['id']; ?>" class="text-dark font-weight-bold" style="text-decoration:none;">
                  <?= $row['title']; ?>
                </a>
              </h5>
              <p class="text-muted small mb-2"><?= $artikel ?>...</p>
            </div>
            <div class="text-muted small">
              <?= $row['author'] ?? 'Tanpa Penulis'; ?> | 
              <?= $row['category'] ?? 'Tanpa Kategori'; ?> | 
              <?= date('d M Y', strtotime($row['date'])); ?>
            </div>
          </div>
        </div>
        <?php
          }
        }
        ?>
      </div>

      <!-- SIDEBAR -->
      <div class="col-md-4">
        <div class="mb-4">
          <h5>Kategori</h5>
          <ul class="list-group">
            <?php
            $kategori = mysqli_query($koneksi, "SELECT * FROM category");
            while ($k = mysqli_fetch_assoc($kategori)) {
              echo "<li class='list-group-item'><a href='kategori.php?kategori=" . urlencode($k['nama']) . "'>" . $k['nama'] . "</a></li>";
            }
            ?>
          </ul>
        </div>

        <div class="mb-4">
          <h5>Tentang</h5>
          <p>Website Bacainfo menyajikan artikel dari berbagai kategori populer seperti gaya hidup, kesehatan, teknologi, dan traveling.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center mt-5 mb-3 text-muted">
    &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
  </footer>

  </div> 
  </body>
  </html>
