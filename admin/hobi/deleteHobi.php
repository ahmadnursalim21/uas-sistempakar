<?php
require "../../middleware/admin.php";
require "../../database/database.php";

// Pastikan ada parameter id
if (!isset($_GET['id'])) {
    header("Location: index.php?message=error");
    exit;
}

$id = intval($_GET['id']);

// Hapus data user berdasarkan ID
$sql = "DELETE FROM hobi WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Berhasil dihapus
    header("Location: index.php?message=deleted");
} else {
    // Gagal (misalnya ID tidak ditemukan)
    header("Location: index.php?message=error");
}

$stmt->close();
$conn->close();