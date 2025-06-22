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
        <div class="">
            <h2>Tambah Hobi</h2>
            <form action="addHobi.php" method="post">
                <div>
                    <label for="nama">Nama Hobi</label>
                    <input type="text" id="nama" name="nama">
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <?php require "../footer.php" ?>


    <script src="../../public/bootstrap/css/bootstrap.css"></script>
</body>

</html>