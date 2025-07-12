<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data lama
$query = mysqli_query($koneksi, "SELECT * FROM author WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
  echo "Penulis tidak ditemukan.";
  exit;
}

// Proses saat disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nickname = mysqli_real_escape_string($koneksi, $_POST['nickname']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);

  $update = mysqli_query($koneksi, "UPDATE author SET nickname = '$nickname', email = '$email' WHERE id = $id");

  if ($update) {
    header("Location: admin_dashboard.php");
    exit;
  } else {
    echo "Gagal memperbarui data.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Penulis - Bacainfo</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      font-family: 'Fredoka', sans-serif;
      margin: 0;
      position: relative;
    }

    .background-blur {
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%;
      height: 100%;
      background: url('img/bgkategori.jpg') no-repeat center center;
      background-size: cover;
      filter: blur(20px);
      transform: scale(1.1);
    }

    .edit-container {
      max-width: 400px;
      margin: 100px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .edit-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .edit-header h2 {
      font-weight: 600;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-dark {
      border-radius: 8px;
      width: 100%;
    }

    .back-link {
      text-align: center;
      margin-top: 15px;
    }

    .back-link a {
      color: #6c757d;
    }

    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="background-blur"></div>

  <div class="edit-container">
    <div class="edit-header">
      <h2><i class="fas fa-user-edit"></i> Edit Data Penulis</h2>
    </div>

    <form method="POST">
      <div class="form-group">
        <label>Nama Penulis</label>
        <input type="text" name="nickname" class="form-control" value="<?= htmlspecialchars($data['nickname']) ?>" required>
      </div>
      <div class="form-group">
        <label>Email Penulis</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($data['email']) ?>" required>
      </div>
      <button type="submit" class="btn btn-dark mt-2">Simpan Perubahan</button>
    </form>

    <div class="back-link">
      <p><a href="admin_dashboard.php"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a></p>
    </div>
  </div>
</body>
</html>
