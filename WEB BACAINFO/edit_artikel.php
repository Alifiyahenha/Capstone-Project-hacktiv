<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data artikel yang akan diedit
$query = $koneksi->query("SELECT * FROM article WHERE id = $id");
$artikel = $query->fetch_assoc();

if (!$artikel) {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location='dashboard_admin.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $tanggal = $_POST['tanggal'];
    $isi = $koneksi->real_escape_string($_POST['isi']);

    if (!empty($_FILES['gambar']['name'])) {
        $nama_file = basename($_FILES['gambar']['name']);
        $lokasi_tmp = $_FILES['gambar']['tmp_name'];
        $folder = 'img/' . $nama_file;

        if (!empty($artikel['picture']) && file_exists('img/' . $artikel['picture'])) {
            unlink('img/' . $artikel['picture']);
        }

        move_uploaded_file($lokasi_tmp, $folder);
        $koneksi->query("UPDATE article SET title='$judul', date='$tanggal', content='$isi', picture='$nama_file' WHERE id=$id");
    } else {
        $koneksi->query("UPDATE article SET title='$judul', date='$tanggal', content='$isi' WHERE id=$id");
    }

    echo "<script>alert('Artikel berhasil diperbarui'); window.location='admin_dashboard.php';</script>";
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

    .img-thumbnail {
      margin-top: 10px;
      max-height: 150px;
    }
  </style>
</head>
<body>
<a href="admin_dashboard.php" class="home-button" title="Kembali ke Dashboard">
  <i class="bi bi-arrow-left"></i>
</a>

<div class="overlay d-flex justify-content-center align-items-start">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <h3 class="text-center form-title"><i class="bi bi-pencil-square"></i> Edit Artikel</h3>
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="judul">Judul Artikel</label>
              <input type="text" name="judul" id="judul" class="form-control" required value="<?= htmlspecialchars($artikel['title']) ?>">
            </div>

            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" name="tanggal" id="tanggal" class="form-control" required value="<?= $artikel['date'] ?>">
            </div>

            <div class="form-group">
              <label for="isi">Isi Artikel</label>
              <textarea name="isi" id="editor" class="form-control" rows="10"><?= htmlspecialchars($artikel['content']) ?></textarea>
              <script> CKEDITOR.replace('editor'); </script>
            </div>

            <div class="form-group">
              <label>Gambar Saat Ini</label><br>
              <?php if (!empty($artikel['picture'])): ?>
                <img src="img/<?= htmlspecialchars($artikel['picture']) ?>" class="img-thumbnail" alt="Gambar Saat Ini">
              <?php else: ?>
                <p><i>Tidak ada gambar</i></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="gambar">Ganti Gambar (opsional)</label>
              <input type="file" name="gambar" id="gambar" class="form-control-file">
            </div>

            <div class="text-right">
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
