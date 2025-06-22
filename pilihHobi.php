<?php
session_start();
$id_pengguna = $_SESSION['user_id']; // asumsinya sudah login dan session diset
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pilih Hobi</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>

<body>

    <?php require "layouts/header.php" ?>
    <div class="container mt-5">
        <h3 class="mb-4">Form Pemilihan Hobi</h3>

        <form action="simpanHobi.php" method="post">
            <div class="mb-3">
                <label class="form-label">Pilih Hobi Anda:</label>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $hobi = [
                            1 => 'Menggambar',
                            2 => 'Coding',
                            3 => 'Membaca',
                            4 => 'Menari',
                            5 => 'Bermusik',
                            6 => 'Olahraga',
                            7 => 'Menulis',
                            8 => 'Bermain Game',
                            9 => 'Traveling',
                            10 => 'Memasak'
                        ];
                        foreach ($hobi as $id => $nama) {
                            echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="' . $id . '" id="hobi' . $id . '">
                            <label class="form-check-label" for="hobi' . $id . '">' . $nama . '</label>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $hobi2 = [
                            11 => 'Fotografi',
                            12 => 'Berbicara di depan umum',
                            13 => 'Membuat Kerajinan',
                            14 => 'Mengutak-atik Elektronik',
                            15 => 'Mengajar',
                            16 => 'Berdiskusi',
                            17 => 'Menganalisis',
                            18 => 'Desain Interior',
                            19 => 'Bertanam',
                            20 => 'Menonton Film'
                        ];
                        foreach ($hobi2 as $id => $nama) {
                            echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="' . $id . '" id="hobi' . $id . '">
                            <label class="form-check-label" for="hobi' . $id . '">' . $nama . '</label>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Ini bagian yang sebelumnya salah -->
            <input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <?php require "layouts/footer.php" ?>
    <script src="public/bootstrap/js/bootstrap.js"></script>
</body>

</html>