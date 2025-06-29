<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <?php require "layouts/header.php" ?>
    <div class="container d-flex">
        <div>
            <h2>Hallo </h2>
            <p>Cek hobimu apakah seseuai dengan jurusan yang kamu ingin kan</p>
            <a href="pilihHobi.php" class="btn btn-primary">Cek sekarang</a>
        </div>
        <div>
            <img src="images/icon.png" alt="Gambar Atlate" style="width: 300px;">
        </div>
    </div>


    <?php require "layouts/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>