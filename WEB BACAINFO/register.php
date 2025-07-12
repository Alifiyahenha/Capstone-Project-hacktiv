<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = mysqli_real_escape_string($koneksi, $_POST['nickname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $cek = mysqli_query($koneksi, "SELECT id FROM author WHERE email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Email sudah terdaftar.";
    } else {
        mysqli_query($koneksi, "
            INSERT INTO author (nickname, email, password)
            VALUES ('$nickname', '$email', '$password')
        ");
        $_SESSION['user_id'] = mysqli_insert_id($koneksi);
        $_SESSION['nickname'] = $nickname;
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Akun</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>Daftar Akun</h2>
  <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
  <form method="POST">
    <div class="form-group">
      <label>Nama Penulis</label>
      <input type="text" name="nickname" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Daftar</button>
  </form>
</body>
</html>
