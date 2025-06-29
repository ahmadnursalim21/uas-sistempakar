<?php
require "../../middleware/admin.php";
require "../../database/database.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pengguna - Admin</title>
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

    <!-- Navbar (untuk toggle sidebar di mobile) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-12 col-lg-3 col-xl-2 collapse sidebar d-lg-block">
                <div class="position-sticky p-3">
                    <?php require "../sidebar.php"; ?>
                </div>
            </nav>

            <!-- Content -->
            <main class="col py-4">
                <div class="container">
                    <h3 class="mb-4"><i class="bi bi-people me-2"></i>Data Pengguna</h3>
                    <div class="mb-3">
                        <a href="createUser.php" class="btn btn-primary">Add Pengguna</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php $no = 1; ?>
                                        <?php while ($r = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= htmlspecialchars($r['name']) ?></td>
                                            <td><?= htmlspecialchars($r['email']) ?></td>
                                            <td><?= htmlspecialchars(ucfirst($r['role'])) ?></td>
                                            <td>
                                                <a href="editUser.php?id=<?= $r['id'] ?>"
                                                    class="btn btn-sm btn-success me-1">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="deleteUser.php?id=<?= $r['id'] ?>"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?');">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada data pengguna.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <?php require "../footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>