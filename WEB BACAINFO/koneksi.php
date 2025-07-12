<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "dbcms";

// Membuat koneksi
$koneksi = mysqli_connect($serverName, $userName, $password, $dbName);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
