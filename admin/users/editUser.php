<?php
require "../../middleware/admin.php";
require "../../database/database.php";

// Ambil ID user dari parameter URL
$id = $_GET['id'] ?? 0;

// Query data user
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<script>alert('Data user tidak ditemukan.'); window.location.href='listUsers.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
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
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar toggle untuk mobile -->
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
                    <h3 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Edit User</h3>

                    <div class="card">
                        <div class="card-body">
                            <form action="updateUser.php" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        value="<?= htmlspecialchars($user['name']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        value="<?= htmlspecialchars($user['email']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin
                                        </option>
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                                </button>
                                <a href="http://localhost/uas-sistempakar-s6/admin/users/"
                                    class="btn btn-secondary">Batal</a>
                            </form>
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