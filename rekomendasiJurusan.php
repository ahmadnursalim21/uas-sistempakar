<?php
session_start();
require "database/database.php";
// Ambil ID pengguna dari session login, bukan dari POST
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Anda belum login.'); window.location.href='login.php';</script>";
    exit;
}

$id_pengguna = $_SESSION['user_id'];

// Ambil semua ID hobi milik pengguna
$sql = "
    SELECT jurusan.id, jurusan.nama, SUM(relasi.tingkat_kecocokan) AS total_skor
    FROM hobi_users
    JOIN relasi_hobi_jurusan AS relasi ON hobi_users.id_hobi = relasi.id_hobi
    JOIN jurusan ON jurusan.id = relasi.id_jurusan
    WHERE hobi_users.id_pengguna = ?
    GROUP BY jurusan.id
    ORDER BY total_skor DESC
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Jurusan</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>

<body>

    <?php require "layouts/header.php" ?>

    <div class="container mt-5">


        <h3>Hasil Rekomendasi Jurusan</h3>

        <?php if ($result->num_rows > 0): ?>
        <div class="list-group mt-3">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1"><?= htmlspecialchars($row['nama']) ?></h5>
                    <small>Skor Kecocokan: <?= $row['total_skor'] ?></small>
                </div>
                <a href="detailJurusan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Lihat Detail</a>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <div class="alert alert-warning mt-3">Tidak ada jurusan yang cocok. Silakan pilih hobi terlebih dahulu.</div>
        <?php endif; ?>
    </div>

    <?php require "layouts/footer.php" ?>
    <script src="public/bootstrap/js/bootstrap.js"></script>
</body>

</html>