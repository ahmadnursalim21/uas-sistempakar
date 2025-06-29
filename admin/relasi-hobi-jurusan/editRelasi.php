<?php
require "../../database/database.php";

// Ambil ID relasi dari URL
$id_relasi = $_GET['id'] ?? null;

// Jika tidak ada ID, redirect
if (!$id_relasi) {
    header("Location: http://localhost/uas-sistempakar-s6/admin/relasi-hobi-jurusan/");
    exit;
}

// Ambil data relasi
$sql = "
    SELECT * FROM relasi_hobi_jurusan
    WHERE id_relasi = ?
";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_relasi);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$relasi = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan
if (!$relasi) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
    exit;
}

// Ambil daftar hobi
$hobi = mysqli_query($conn, "SELECT * FROM hobi");

// Ambil daftar jurusan
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Relasi Hobi - Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .sidebar {
        background-color: #343a40;
        min-height: 100vh;
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
            <?php require "../sidebar.php" ?>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h3 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Relasi Hobi - Jurusan</h3>

            <div class="card">
                <div class="card-body">
                    <form action="editRelasi.php" method="post">
                        <input type="hidden" name="id_relasi" value="<?= htmlspecialchars($relasi['id_relasi']) ?>">

                        <div class="mb-3">
                            <label for="id_hobi" class="form-label">Nama Hobi</label>
                            <select name="id_hobi" id="id_hobi" class="form-select" required>
                                <option value="">- Pilih Hobi -</option>
                                <?php foreach ($hobi as $h): ?>
                                <option value="<?= $h['id'] ?>" <?= $h['id'] == $relasi['id_hobi'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($h['nama']) ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_jurusan" class="form-label">Nama Jurusan</label>
                            <select name="id_jurusan" id="id_jurusan" class="form-select" required>
                                <option value="">- Pilih Jurusan -</option>
                                <?php foreach ($jurusan as $j): ?>
                                <option value="<?= $j['id'] ?>"
                                    <?= $j['id'] == $relasi['id_jurusan'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($j['nama']) ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tingkat_kecocokan" class="form-label">Tingkat Kecocokan</label>
                            <input type="number" min="0" max="100" class="form-control" id="tingkat_kecocokan"
                                name="tingkat_kecocokan" value="<?= htmlspecialchars($relasi['tingkat_kecocokan']) ?>"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                        <a href="listRelasi.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require "../footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>