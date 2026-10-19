<?php
// mahasiswa.php
// Menampilkan daftar mahasiswa (JOIN dengan prodi)
// Pastikan pertemuan4/koneksi.php sudah ada dan database db_kampus sudah di-import

// Untuk development: aktifkan error reporting bila perlu
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require 'koneksi.php';

// Query dengan JOIN untuk mendapatkan nama_prodi
$sql = "SELECT
            m.nim,
            m.nama,
            p.nama_prodi,
            m.email,
            m.angkatan,
            m.status
        FROM mahasiswa m
        JOIN prodi p
            ON p.id_prodi = m.id_prodi
        ORDER BY m.nama ASC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

$jumlah = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
        th { background: #f2f2f2; }
        .note { margin-bottom: 12px; color: #333; }
    </style>
</head>
<body>
<h2>Data Mahasiswa</h2>
<p class="note">Jumlah mahasiswa: <?= (int)$jumlah ?></p>

<?php if ($jumlah > 0): ?>
<table>
    <thead>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Email</th>
        <th>Angkatan</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= htmlspecialchars($row['nim']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['nama_prodi']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['angkatan']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
    </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Data mahasiswa belum tersedia.</p>
<?php endif; ?>

</body>
</html>
