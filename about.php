<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About | Page</title>
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
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h1 class="text-primary mb-3">Tentang Sistem Pakar</h1>
                    <p class="lead">
                        Sistem Pakar ini dikembangkan untuk membantu siswa menemukan jurusan
                        yang sesuai dengan minat dan bakat mereka, khususnya melalui analisis hobi yang mereka sukai.
                    </p>
                    <p>
                        Dengan teknologi berbasis pengetahuan (knowledge-based system),
                        sistem ini meniru cara berpikir seorang ahli dalam memberikan rekomendasi yang akurat
                        dan sesuai dengan kebutuhan pengguna.
                    </p>
                    <p>
                        Aplikasi ini dibuat sebagai bagian dari pengembangan teknologi pendidikan
                        agar proses pemilihan jurusan menjadi lebih mudah, cepat, dan tepat sasaran.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="images/about.png" alt="About Image" class="img-fluid rounded shadow"
                        style="max-width: 400px;">
                </div>
            </div>
        </div>
    </main>

    <?php include "layouts/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>