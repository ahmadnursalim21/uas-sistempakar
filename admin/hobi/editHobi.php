<?php
require "../../middleware/admin.php";
require "../../database/database.php";

// Proses simpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST["id"];
    $nama = $_POST["nama"];

    $sql = "UPDATE hobi SET nama = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $nama, $id);
        $stmt->execute();

        if ($stmt->affected_rows >= 0) {
            header("Location: http://localhost/uas-sistempakar-s6/admin/hobi/");
            exit;
        } else {
            die("Update gagal: " . $conn->error);
        }
    } else {
        die("Prepare statement gagal: " . $conn->error);
    }
}

// Kalau bukan POST → tampilkan data hobi
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];

$sql = "SELECT * FROM hobi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query error: " . $conn->error);
}

$hobi = $result->fetch_assoc();

if (!$hobi) {
    echo "<script>alert('Data hobi tidak ditemukan.'); window.location.href='index.php';</script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
    body {
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .sidebar {
        background-color: #343a40;
        min-height: 100vh;
        padding: 1rem;
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
    <div class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php require "../sidebar.php"; ?>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            <h3 class="mb-4">
                <i class="bi bi-pencil-square me-2"></i>Edit Hobi
            </h3>

            <div class="card">
                <div class="card-body">
                    <form action="editHobi.php" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($hobi['id']) ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Hobi</label>
                            <input type="text" class="form-control" id="nama" name="nama" required
                                value="<?= htmlspecialchars($hobi['nama']) ?>" placeholder="Masukkan nama hobi">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="http://localhost/uas-sistempakar-s6/admin/hobi/" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require "../footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>