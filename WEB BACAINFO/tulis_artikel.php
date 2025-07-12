<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nickname'])) {
    header("Location: login.php");
    exit();
}

$namaPenulis = $_SESSION['nickname'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tulis Artikel - Bacainfo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body, html {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      height: 100%;
      scroll-behavior: smooth;
      color: #333;
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
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      min-height: 100vh;
      padding-top: 70px;
      position: relative;
      z-index: 1;
    }

    .canvas-box {
      background: rgba(255, 255, 255, 0.7);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      max-width: 850px;
      margin: auto;
      backdrop-filter: blur(6px);
      border: 1px solid rgba(255,255,255,0.4);
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: #5c3d8d;
      margin-bottom: 30px;
    }

    label {
      font-weight: 600;
      margin-top: 15px;
    }

    .form-control,
    .form-control-file,
    .form-select {
      border-radius: 10px;
      box-shadow: none;
      border: 1px solid #ccc;
      transition: all 0.2s ease-in-out;
    }

    .form-control:focus {
      border-color: #b478df;
      box-shadow: 0 0 5px rgba(180, 120, 223, 0.4);
    }

    .ck-editor__editable {
      min-height: 250px;
      border-radius: 10px;
    }

    .btn-gradient {
      background: linear-gradient(135deg, #b66ddf, #ff90c2);
      color: white;
      border: none;
      padding: 14px 32px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .btn-gradient:hover {
      transform: scale(1.05);
      background: linear-gradient(135deg, #a84ce0, #ff77b0);
      box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    }

    footer {
      margin-top: 40px;
      text-align: center;
      color: #666;
    }

    @media (max-width: 576px) {
      .canvas-box {
        padding: 25px;
      }

      h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

<!-- Background -->
<div class="background-wrapper">
  <img src="img/bgkategori.jpg" alt="Background">
</div>

<!-- Overlay -->
<div class="overlay">
  <div class="canvas-box">
    <h2>📝 Halo, <?= htmlspecialchars($namaPenulis) ?>! Tulis Artikelmu di Sini</h2>

    <form action="simpan_artikel.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label>Judul Artikel</label>
        <input type="text" name="title" class="form-control" placeholder="Masukkan judul yang menarik..." required>
      </div>

      <div class="form-group">
        <label>Konten</label>
        <textarea name="content" id="editor" class="form-control" rows="10" required></textarea>
        <script>CKEDITOR.replace('editor');</script>
      </div>

      <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" class="form-control" required>
          <?php
          $kategori = mysqli_query($koneksi, "SELECT * FROM category");
          while ($row = mysqli_fetch_assoc($kategori)) {
              echo "<option value='{$row['id']}'>{$row['nama']}</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label>Gambar (opsional)</label>
        <input type="file" name="picture" class="form-control-file">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-gradient">✉️ Kirim Artikel</button>
      </div>
    </form>
  </div>
</div>

<!-- Footer -->
<footer>
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>

</body>
</html>
