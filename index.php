<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>

<body>

    <?php require "layouts/header.php" ?>
    <div class="container d-flex">
        <div>
            <h2>Hallo </h2>
            <p>Cek hobimu apakah seseuai dengan jurusan yang kamu ingin kan</p>
            <a href="diagnosa/diagnosa.php" class="btn btn-primary">Cek sekarang</a>
        </div>
        <div>
            <img src="images/icon.png" alt="Gambar Atlate" style="width: 300px;">
        </div>
    </div>


    <?php require "layouts/footer.php" ?>
    <script src="public/bootstrap/js/bootstrap.js"></script>
</body>

</html>