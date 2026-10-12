<?php
require 'koneksi.php';

$sql = "SELECT m.nim, m.nama, m.email, m.angkatan, p.nama_prodi
        FROM mahasiswa m
        JOIN prodi p ON p.id_prodi = m.id_prodi
        ORDER BY m.nama ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
        }
        th, td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Angkatan</th>
                <th>Program Studi</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nim']) ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['angkatan']) ?></td>
                    <td><?= htmlspecialchars($row['nama_prodi']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Data mahasiswa belum tersedia.</p>
    <?php endif; ?>
</body>
</html>
