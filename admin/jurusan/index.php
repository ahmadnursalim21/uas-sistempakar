<?php
require "../../database/database.php";

$sql = "SELECT * FROM jurusan";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin Jurusan</title>
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
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $r): ?>
                            <tr>
                                <td><?= $r['id'] ?></td>
                                <td><?= $r['nama'] ?></td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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