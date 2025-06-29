<?php
require "../../database/database.php";

$sql = "SELECT * FROM jurusan";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Jurusan - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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

    .card {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">



    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <?php require "../sidebar.php"; ?>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h3 class="mb-4"><i class="bi bi-journal-code me-2"></i>Data Jurusan</h3>

            <a href="addJurusan.php" class="btn btn-primary mb-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Jurusan
            </a>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $r): ?>
                                <tr>
                                    <td><?= htmlspecialchars($r['id']) ?></td>
                                    <td><?= htmlspecialchars($r['nama']) ?></td>
                                    <td>
                                        <a href="editJurusan.php?id=<?= $r['id'] ?>" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="deleteJurusan.php?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
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

        </div>
    </div>

    <?php require "../footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>