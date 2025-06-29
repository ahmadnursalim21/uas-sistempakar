<?php
session_start();
require_once "middleware/auth.php";
$id_pengguna = $_SESSION['user_id']; // asumsinya sudah login dan session diset
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Pilih Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
            <div class="bg-light rounded shadow p-4">
                <h3 class="mb-4 text-primary">
                    <i class="bi bi-clipboard-check-fill me-2"></i> Pilih Hobi Anda
                </h3>
                <p class="mb-4">
                    Pilihlah beberapa hobi yang Anda sukai. Sistem kami akan membantu mencarikan jurusan yang sesuai
                    dengan minat Anda.
                </p>

                <form action="simpanHobi.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row row-cols-1">
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
                                    echo '
                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobi[]" value="' . $id . '" id="hobi' . $id . '">
                                                <label class="form-check-label" for="hobi' . $id . '">' . $nama . '</label>
                                            </div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row row-cols-1">
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
                                    echo '
                                        <div class="col mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hobi[]" value="' . $id . '" id="hobi' . $id . '">
                                                <label class="form-check-label" for="hobi' . $id . '">' . $nama . '</label>
                                            </div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">

                    <button type="submit" class="btn btn-primary mt-4">
                        <i class="bi bi-save me-1"></i> Simpan Hobi
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php require "layouts/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>