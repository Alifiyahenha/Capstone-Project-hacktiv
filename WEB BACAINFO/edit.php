<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    echo "Akses ditolak!";
    exit;
}

$id = intval($_GET['id']);
$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

$query = mysqli_query($koneksi, "
    SELECT a.*, au.nickname, au.id as author_id 
    FROM article a
    LEFT JOIN article_author aa ON a.id = aa.article_id
    LEFT JOIN author au ON aa.author_id = au.id
    WHERE a.id = $id
");

$data = mysqli_fetch_assoc($query);

if (!$data || ($role !== 'admin' && $data['author_id'] != $user_id)) {
    echo "Kamu tidak berhak mengedit artikel ini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Artikel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>


  <style>
    body {
      background-image: url('img/bgkategori.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .overlay {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(10px);
      min-height: 100vh;
      padding-top: 80px;
      padding-bottom: 60px;
    }

    .form-container {
      background: white;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-weight: 700;
      margin-bottom: 25px;
      color: #6f42c1;
    }

    .btn-primary {
      background-color: #6f42c1;
      border: none;
    }

    .btn-primary:hover {
      background-color: #5a35a3;
    }

    .form-group label {
      font-weight: 600;
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
    .container {
      background: transparent !important;
    }
  </style>
</head>
<body>
 <a href="index.php" class="home-button" title="Kembali ke Beranda">
    <i class="fas fa-home"></i>
  </a>

<div class="overlay d-flex justify-content-center align-items-start">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <h3 class="text-center form-title"><i class="bi bi-pencil-square"></i> Edit Artikel</h3>
          <form action="update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="form-group">
              <label>Judul Artikel</label>
              <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['title']) ?>" required>
            </div>

            <div class="form-group">
              <label>Isi Artikel</label>
            <textarea name="isi" id="editor" class="form-control" rows="10"><?= $data['content'] ?></textarea>
<script>
  CKEDITOR.replace('editor');
</script>

            </div>

            <div class="form-group">
              <label>Penulis</label>
              <input type="text" class="form-control" value="<?= htmlspecialchars($data['nickname']) ?>" readonly>
            </div>

            <div class="form-group">
              <label>Gambar Saat Ini</label><br>
              <?php if (!empty($data['picture'])): ?>
                <img src="img/<?= htmlspecialchars($data['picture']) ?>" width="200" class="img-thumbnail">
              <?php else: ?>
                <p><i>Tidak ada gambar</i></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label>Ganti Gambar (opsional)</label>
              <input type="file" class="form-control-file" name="gambar">
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              <a href="<?= ($role === 'admin') ? 'admin_dashboard.php' : 'artikel.php' ?>" class="btn btn-secondary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
