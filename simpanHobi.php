<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "middleware/auth.php";
require "database/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id_pengguna = $_SESSION['user_id'];
$hobi = $_POST['hobi'] ?? [];

if (empty($hobi)) {
    echo "<script>alert('Anda belum memilih hobi.'); window.location.href='pilihHobi.php';</script>";
    exit;
}

// Hapus data lama (opsional)
$sql = "DELETE FROM hobi_users WHERE id_pengguna = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pengguna);
$stmt->execute();

// Insert hobi yang baru
$sql_insert = "INSERT INTO hobi_users (id_pengguna, id_hobi) VALUES (?, ?)";
$stmt_insert = $conn->prepare($sql_insert);

foreach ($hobi as $id_hobi) {
    $stmt_insert->bind_param("ii", $id_pengguna, $id_hobi);
    $stmt_insert->execute();
}

header("Location: rekomendasiJurusan.php");
exit;