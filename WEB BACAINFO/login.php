<?php
session_start();
include 'koneksi.php';

$error = '';

// Jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $email = mysqli_real_escape_string($koneksi, $email);

        // Ambil user dari database
        $query = mysqli_query($koneksi, "SELECT * FROM author WHERE email = '$email' LIMIT 1");

        if ($query && mysqli_num_rows($query) > 0) {
            $user = mysqli_fetch_assoc($query);

            // Cek password
            if (password_verify($password, $user['password'])) {
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['role'] = $user['role']; // 'admin' atau 'author'
                
                // Redirect ke index
                header("Location: index.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Akun tidak ditemukan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Bacainfo</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      font-family: 'Fredoka', sans-serif;
      margin: 0;
    }

    .background-wrapper {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
    }

    .background-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.6);
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .login-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .login-header h2 {
      font-weight: 600;
    }

    .form-control {
      border-radius: 8px;
    }

    .btn-dark {
      border-radius: 8px;
      width: 100%;
    }

    .register-link {
      text-align: center;
      margin-top: 15px;
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
  </style>
</head>
<body>
  <div class="background-wrapper">
    <img src="img/bgkategori.jpg" alt="Background Gambar">
  </div>

  <div class="login-container">
    <div class="login-header">
      <h2><i class="fas fa-user-circle"></i> Login ke Bacainfo</h2>
    </div>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-dark mt-2">Login</button>
    </form>

    <div class="register-link">
      <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
  </div>
</body>
</html>
