<?php
require "../middleware/admin.php";

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
    body {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .sidebar {
        background-color: #343a40;
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

    <!-- Navbar (untuk toggler sidebar mobile) -->
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
            <nav id="sidebarMenu" class="col-12 col-lg-3 col-xl-2 collapse sidebar d-lg-block vh-100">
                <div class="position-sticky p-3">
                    <?php require "sidebar.php" ?>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col py-4">
                <div class="container-fluid">
                    <h2 class="mb-4"><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</h2>

                    <div class="row g-4">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card text-bg-primary h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Total Hobi</h5>
                                            <p class="fs-3 fw-bold mt-2">12</p>
                                        </div>
                                        <i class="bi bi-heart-pulse-fill fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card text-bg-success h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Total Jurusan</h5>
                                            <p class="fs-3 fw-bold mt-2">10</p>
                                        </div>
                                        <i class="bi bi-journal-code fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="card text-bg-warning h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-0">Total Pengguna</h5>
                                            <p class="fs-3 fw-bold mt-2">24</p>
                                        </div>
                                        <i class="bi bi-people-fill fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="mt-5">
                        <h5 class="mb-3"><i class="bi bi-table me-2"></i>Data Pengguna Terbaru</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Hobi Dipilih</th>
                                        <th>Rekomendasi Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Andi</td>
                                        <td>Menggambar, Bermusik</td>
                                        <td>Desain Komunikasi Visual, Seni Musik</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Budi</td>
                                        <td>Coding, Membaca</td>
                                        <td>Informatika, Ilmu Komunikasi</td>
                                    </tr>
                                    <!-- Tambah data lainnya -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require "footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>