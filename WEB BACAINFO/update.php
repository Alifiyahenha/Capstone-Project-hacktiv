<?php
include 'koneksi.php';

$id       = $_POST['id'];
$judul    = $_POST['judul'];
$isi      = $_POST['isi'];
$penulis  = $_POST['penulis'];

$uploadGambar = false;
$gambarBaru = '';

if ($_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    // Validasi ekstensi file
    $ekstensiValid = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ekstensi = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    // Validasi ukuran file (maks 2MB)
    $ukuranFile = $_FILES['gambar']['size'];
    if (!in_array($ekstensi, $ekstensiValid)) {
        echo "<script>alert('Format gambar tidak valid! Gunakan jpg, jpeg, png, gif, atau webp'); history.back();</script>";
        exit;
    } elseif ($ukuranFile > 2 * 1024 * 1024) {
        echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 2MB'); history.back();</script>";
        exit;
    } else {
        // Generate nama unik agar tidak bentrok
        $gambarBaru = uniqid() . '.' . $ekstensi;
        move_uploaded_file($tmp, "img/" . $gambarBaru);
        $uploadGambar = true;
    }
}

// Query Update
if ($uploadGambar) {
    $query = "UPDATE article SET judul='$judul', isi='$isi', penulis='$penulis', picture='$gambarBaru' WHERE id='$id'";
} else {
    $query = "UPDATE article SET judul='$judul', isi='$isi', penulis='$penulis' WHERE id='$id'";
}

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('Artikel berhasil diupdate!'); window.location.href='artikel.php';</script>";
} else {
    echo "Update gagal: " . mysqli_error($conn);
}

?>
<footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>