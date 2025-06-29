<?php
require "database/database.php";

$id = $_GET['id'] ?? 0;

// Query data jurusan
$sql = "SELECT * FROM jurusan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$jurusan = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Detail Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <?php if ($jurusan): ?>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            <?= htmlspecialchars($jurusan['nama']) ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?= !empty($jurusan['deskripsi']) ? htmlspecialchars($jurusan['deskripsi']) : 'Deskripsi jurusan ini belum tersedia.' ?>
                        </p>

                        <?php if (!empty($jurusan['prospek_kerja'])): ?>
                            <h5 class="mt-4 text-success">
                                <i class="bi bi-briefcase-fill me-2"></i>Prospek Kerja
                            </h5>
                            <p><?= htmlspecialchars($jurusan['prospek_kerja']) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($jurusan['mata_kuliah'])): ?>
                            <h5 class="mt-4 text-info">
                                <i class="bi bi-journal-text me-2"></i>Mata Kuliah
                            </h5>
                            <p><?= htmlspecialchars($jurusan['mata_kuliah']) ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-end">
                        <a href="javascript:history.back()" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Jurusan tidak ditemukan.
                </div>
                <a href="javascript:history.back()" class="btn btn-secondary mt-3">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            <?php endif; ?>
        </div>
    </main>

    <?php require "layouts/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>