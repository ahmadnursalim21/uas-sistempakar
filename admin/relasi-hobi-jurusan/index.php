<?php
require "../../database/database.php";

$sql = "SELECT * FROM relasi_hobi_jurusan";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin relasi</title>
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
            <h5>Data relasi</h5>
            <a href="addHobi.php" class="btn btn-primary">Tambah Hobi</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Relasi</th>
                            <th>ID Hobi</th>
                            <th>ID Jurusan</th>
                            <th>Tingkat kecocokan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $r): ?>
                        <tr>
                            <td><?= $r['id_relasi'] ?></td>
                            <td><?= $r['id_hobi'] ?></td>
                            <td><?= $r['id_jurusan'] ?></td>
                            <td><?= $r['tingkat_kecocokan'] ?></td>
                            <td>
                                <a href="addRelasi.php" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require "../footer.php" ?>
    <script src="../../public/bootstrap/css/bootstrap.css"></script>

</body>

</html>