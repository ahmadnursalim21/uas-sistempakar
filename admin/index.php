<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <link href="../public/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php require "sidebar.php" ?>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h2>Dashboard</h2>
            <div class="row mt-4">
                <!-- Cards -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Hobi</h5>
                            <p class="card-text fs-4">12</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Jurusan</h5>
                            <p class="card-text fs-4">10</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Pengguna</h5>
                            <p class="card-text fs-4">24</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="mt-4">
                <h5>Data Pengguna Terbaru</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
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
                            <!-- Tambah baris lainnya -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../public/bootstrap/js/bootstrap.js" rel="stylesheet" />"></script>
</body>

</html>