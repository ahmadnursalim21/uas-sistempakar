<?php
// koneksi ke database
require "database/database.php";
// id pengguna login (misal: 1)
$id_pengguna = 1;

$sql = "
SELECT 
    jurusan.id,
    jurusan.nama,
    SUM(relasi_hobi_jurusan.tingkat_kecocokan) AS skor_total
FROM hobi_users
JOIN relasi_hobi_jurusan ON hobi_users.id_hobi = relasi_hobi_jurusan.id_hobi
JOIN jurusan ON relasi_hobi_jurusan.id_jurusan = jurusan.id
WHERE hobi_users.id_pengguna = $id_pengguna
GROUP BY jurusan.id
ORDER BY skor_total DESC
LIMIT 5
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h3>Rekomendasi Jurusan untuk Anda</h3>

    <?php if ($result->num_rows > 0): ?>
    <div class="list-group mt-4">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1"><?= htmlspecialchars($row['nama']) ?></h5>
                <small>Skor Kecocokan: <?= $row['skor_total'] ?></small>
            </div>
            <a href="detail_jurusan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Lihat Detail</a>
        </div>
        <?php endwhile; ?>
    </div>
    <?php else: ?>
    <div class="alert alert-warning mt-4">Belum ada rekomendasi. Silakan pilih hobi terlebih dahulu.</div>
    <?php endif; ?>

</body>

</html>