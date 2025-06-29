<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact | Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
    html,
    body {
        height: 100%;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include "layouts/header.php" ?>

    <main class="flex-grow-1">
        <div class="container my-5">
            <h1 class="text-primary mb-4">Hubungi Kami</h1>
            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="4"
                                placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
                <!-- Contact Info -->
                <div class="col-md-6 mt-4 mt-md-0">
                    <h5>Informasi Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Jl. Contoh No.123, Kota Contoh</li>
                        <li><i class="bi bi-envelope-fill me-2"></i>info@sistempakar.com</li>
                        <li><i class="bi bi-telephone-fill me-2"></i>(021) 123-4567</li>
                    </ul>
                    <p>
                        Kami Siap Membantu Menjawab Pertanyaan Anda Seputar Sistem Pakar Ini.
                        Jangan Ragu Untuk Menghubungi kami!
                    </p>
                </div>
            </div>
        </div>
    </main>

    <?php include "layouts/footer.php" ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>

</html>