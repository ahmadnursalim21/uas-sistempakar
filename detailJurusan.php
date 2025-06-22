<?php

require "database/database.php";
$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM jurusan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$jurusan = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Jurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <?php if ($jurusan): ?>
    <h3><?= htmlspecialchars($jurusan['nama']) ?></h3>
    <p>Detail jurusan ini akan berisi deskripsi, mata kuliah, prospek kerja, dll.</p>
    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
    <?php else: ?>
    <div class="alert alert-danger">Jurusan tidak ditemukan.</div>
    <?php endif; ?>
</body>

</html>