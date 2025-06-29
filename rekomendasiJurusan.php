<?php
session_start();
require "database/database.php";

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Anda belum login.'); window.location.href='login.php';</script>";
    exit;
}

$id_pengguna = $_SESSION['user_id'];

// Ambil data rekomendasi jurusan
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    html,
    body {
        height: 100%;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "layouts/header.php" ?>

    <main class="flex-grow-1">
        <div class="container my-5">
            <div class="bg-light p-4 rounded shadow">
                <h3 class="text-primary mb-4">
                    <i class="bi bi-stars"></i> Rekomendasi Jurusan Terbaik Untukmu
                </h3>

                <?php if ($result->num_rows > 0): ?>
                <div class="list-group">
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 text-success">
                                <i class="bi bi-mortarboard-fill me-2"></i>
                                <?= htmlspecialchars($row['nama']) ?>
                            </h5>
                            <span class="badge bg-primary">
                                Skor Kecocokan: <?= $row['total_skor'] ?>
                            </span>
                        </div>
                        <a href="detailJurusan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-eye-fill"></i> Lihat Detail
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php else: ?>
                <div class="alert alert-warning mt-3">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Belum ada rekomendasi jurusan untukmu. Silakan pilih hobimu terlebih dahulu di halaman <a
                        href="pilihHobi.php" class="alert-link">Pilih Hobi</a>.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php require "layouts/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>