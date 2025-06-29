<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Hobi - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
    body {
        min-height: 100vh;
        background-color: #f8f9fa;
    }

    .sidebar {
        min-height: 100vh;
        background-color: #343a40;
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
                <i class="bi bi-plus-circle me-2"></i>Tambah Hobi
            </h3>

            <div class="card">
                <div class="card-body">
                    <form action="addHobi.php" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Hobi</label>
                            <input type="text" id="nama" name="nama" class="form-control"
                                placeholder="Masukkan nama hobi" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
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