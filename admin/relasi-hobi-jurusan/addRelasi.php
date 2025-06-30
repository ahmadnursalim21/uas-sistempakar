<?php
require "../../middleware/admin.php";
require "../../database/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_hobi = (int)$_POST["id_hobi"];
    $id_jurusan = (int)$_POST["id_jurusan"];
    $tingkat_kecocokan = (int)$_POST["tingkat_kecocokan"];

    if ($id_hobi == 0 || $id_jurusan == 0 || $tingkat_kecocokan < 1 || $tingkat_kecocokan > 100) {
        echo "<script>alert('Data tidak valid.'); window.history.back();</script>";
        exit;
    }

    // Cek duplikat relasi
    $cek = $conn->prepare("SELECT id_relasi FROM relasi_hobi_jurusan WHERE id_hobi = ? AND id_jurusan = ?");
    $cek->bind_param("ii", $id_hobi, $id_jurusan);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Relasi Hobi dan Jurusan sudah ada.'); window.location.href='index.php';</script>";
        exit;
    }

    // Simpan relasi baru
    $sql = "INSERT INTO relasi_hobi_jurusan (id_hobi, id_jurusan, tingkat_kecocokan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iii", $id_hobi, $id_jurusan, $tingkat_kecocokan);
        $result = $stmt->execute();

        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            die("Gagal menyimpan data: " . $conn->error);
        }
    } else {
        die("Prepare statement gagal: " . $conn->error);
    }
}

// Ambil daftar hobi & jurusan untuk form
$hobi = mysqli_query($conn, "SELECT * FROM hobi");
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Relasi Hobi - Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    body {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .sidebar {
        background-color: #343a40;
        min-height: 100vh;
    }

    .sidebar a {
        color: #adb5bd;
        text-decoration: none;
        display: block;
        padding: 10px 15px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #495057;
        color: #fff;
    }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar (mobile) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid flex-grow-1">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-12 col-lg-3 col-xl-2 collapse sidebar d-lg-block">
                <div class="p-3">
                    <?php require "../sidebar.php"; ?>
                </div>
            </nav>

            <!-- Content -->
            <main class="col py-4">
                <div class="container">
                    <h3 class="mb-4"><i class="bi bi-plus-square me-2"></i>Tambah Relasi Hobi - Jurusan</h3>

                    <div class="card">
                        <div class="card-body">
                            <form action="addRelasi.php" method="post">
                                <div class="mb-3">
                                    <label for="id_hobi" class="form-label">Nama Hobi</label>
                                    <select name="id_hobi" id="id_hobi" class="form-select" required>
                                        <option value="">- Pilih Hobi -</option>
                                        <?php foreach ($hobi as $h) : ?>
                                        <option value="<?= $h['id'] ?>">
                                            <?= htmlspecialchars($h['nama']) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_jurusan" class="form-label">Nama Jurusan</label>
                                    <select name="id_jurusan" id="id_jurusan" class="form-select" required>
                                        <option value="">- Pilih Jurusan -</option>
                                        <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?= $j['id'] ?>">
                                            <?= htmlspecialchars($j['nama']) ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tingkat_kecocokan" class="form-label">Tingkat Kecocokan (%)</label>
                                    <input type="number" min="1" max="100" class="form-control" id="tingkat_kecocokan"
                                        name="tingkat_kecocokan" placeholder="Contoh: 80" required>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Simpan
                                </button>
                                <a href="listRelasi.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require "../footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>