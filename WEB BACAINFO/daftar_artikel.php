<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Artikel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
    body {
    font-family: 'Poppins', sans-serif;
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

    .btn {
      display: inline-block;
      padding: 8px 16px;
      font-weight: 600;
      border-radius: 6px;
      text-decoration: none;
      text-align: center;
    }

    .btn-primary {
      background-color: #6c5ce7;
      color: white;
      transition: background-color 0.5s ease;
    }

    .btn-primary:hover {
      background-color: #5a4fcf;
      color: white;
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

<a href="index.php" class="home-button" title="Kembali ke Beranda">
  <i class="fas fa-home"></i>
</a>

  <div class="background-wrapper">
    <img src="img/bgkategori.jpg" alt="Background" />
  </div>

  <div class="overlay">
    <div class="container card-article">
      <!-- Konten PHP kamu tetap di sini, tidak berubah -->


    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success">
            Artikel berhasil disimpan!
        </div>
        <a href="tulis_artikel.php" class="btn btn-primary">+ Tulis Artikel Baru</a>
    <?php endif; ?>

    <table class="table table-bordered">
       <thead>
    <tr>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penulis</th>
        <th>Tanggal</th>
    </tr>
</thead>

        <tbody>
            <?php
            $query = "
                SELECT a.title, a.date, a.picture, c.nama AS kategori, u.nickname AS penulis
                FROM article a
                JOIN article_category ac ON a.id = ac.article_id
                JOIN category c ON ac.category_id = c.id
                JOIN article_author aa ON a.id = aa.article_id
                JOIN author u ON aa.author_id = u.id
                ORDER BY a.date DESC
            ";

            $result = mysqli_query($koneksi, $query);


                        while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>";
                if (!empty($row['picture'])) {
                    echo "<img src='img/" . htmlspecialchars($row['picture']) . "' alt='Gambar Artikel' style='width:100px;'>";
                } else {
                    echo "—";
                }
                echo "</td>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                echo "<td>" . htmlspecialchars($row['penulis']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>

    
<footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>
</body>
</html>
