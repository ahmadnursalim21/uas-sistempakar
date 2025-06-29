<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pakar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    html,
    body {
        height: 100%;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "layouts/header.php" ?>

    <main class="flex-grow-1">
        <div class="container my-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="display-5 fw-bold text-primary">Halo!</h1>
                    <p class="lead">
                        Cek hobimu apakah sesuai dengan jurusan yang kamu inginkan.
                    </p>
                    <a href="pilihHobi.php" class="btn btn-primary btn-lg mt-3">
                        <i class="bi bi-search"></i> Cek Sekarang
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="images/icon.png" alt="Icon Atlite" class="img-fluid" style="max-width: 300px;">
                </div>
            </div>
        </div>
    </main>

    <?php require "layouts/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>