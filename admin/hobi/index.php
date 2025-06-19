<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin Hobi</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.css">
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

    <?php require "../header.php" ?>

    <div class="d-flex">
        <div>
            <?php require "../sidebar.php" ?>
        </div>
        <div class="mt-4 ms-3">
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
    <?php require "../footer.php" ?>
    <script src="../../public/bootstrap/css/bootstrap.css"></script>

</body>

</html>