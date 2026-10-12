<?php
require 'koneksi.php';

$sql = "SELECT id_fakultas, kode_fakultas, nama_fakultas, dekan
        FROM fakultas
        ORDER BY nama_fakultas ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Fakultas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
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
    <h2>Data Fakultas</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Kode Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Dekan</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_fakultas']) ?></td>
                    <td><?= htmlspecialchars($row['kode_fakultas']) ?></td>
                    <td><?= htmlspecialchars($row['nama_fakultas']) ?></td>
                    <td><?= htmlspecialchars($row['dekan']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Data fakultas belum tersedia.</p>
    <?php endif; ?>
</body>
</html>
