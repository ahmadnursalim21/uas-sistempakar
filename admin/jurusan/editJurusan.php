<?php
require "../../database/database.php";

// Ambil ID jurusan dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('ID jurusan tidak ditemukan.'); window.location.href='listJurusan.php';</script>";
    exit;
}

// Query data jurusan
$sql = "SELECT * FROM jurusan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$jurusan = $result->fetch_assoc();

if (!$jurusan) {
    echo "<script>alert('Data jurusan tidak ditemukan.'); window.location.href='listJurusan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
    body {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .sidebar {
        background-color: #343a40;
        min-height: 100vh;
        padding: 1rem;
    }

    .sidebar a {
        color: #adb5bd;
        text-decoration: none;
        display: block;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #495057;
        color: #fff;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php require "../sidebar.php"; ?>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h3 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Jurusan</h3>

            <div class="card">
                <div class="card-body">
                    <form action="updateJurusan.php" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($jurusan['id']) ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                value="<?= htmlspecialchars($jurusan['nama']) ?>" placeholder="Masukkan nama jurusan">
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="listJurusan.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require "../footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>