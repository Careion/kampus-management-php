<?php
// pertemuan5/koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Untuk development, bila perlu:
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
