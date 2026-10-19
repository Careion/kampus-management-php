<?php
// koneksi.php
// Koneksi sederhana untuk praktikum lokal (XAMPP/Laragon)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Untuk development: aktifkan baris di bawah ini bila ingin melihat error SQL/PHP
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
