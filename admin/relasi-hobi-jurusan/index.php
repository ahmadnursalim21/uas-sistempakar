<?php
require "../../database/database.php";

// Ambil data relasi dan join nama hobi & jurusan
$sql = "
    SELECT 
        relasi_hobi_jurusan.id_relasi,
        hobi.nama AS nama_hobi,
        jurusan.nama AS nama_jurusan,
        relasi_hobi_jurusan.tingkat_kecocokan
    FROM relasi_hobi_jurusan
    JOIN hobi ON relasi_hobi_jurusan.id_hobi = hobi.id
    JOIN jurusan ON relasi_hobi_jurusan.id_jurusan = jurusan.id
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Admin Relasi Hobi - Jurusan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
            <h3 class="mb-4"><i class="bi bi-diagram-3 me-2"></i>Data Relasi Hobi - Jurusan</h3>

            <a href="addRelasi.php" class="btn btn-primary mb-3">
                <i class="bi bi-plus-circle me-1"></i> Tambah Relasi
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Relasi</th>
                            <th>Nama Hobi</th>
                            <th>Nama Jurusan</th>
                            <th>Tingkat Kecocokan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['id_relasi']) ?></td>
                            <td><?= htmlspecialchars($r['nama_hobi']) ?></td>
                            <td><?= htmlspecialchars($r['nama_jurusan']) ?></td>
                            <td><?= htmlspecialchars($r['tingkat_kecocokan']) ?></td>
                            <td>
                                <a href="editRelasi.php?id=<?= $r['id_relasi'] ?>" class="btn btn-success btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="deleteRelasi.php?id=<?= $r['id_relasi'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?');">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require "../footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>