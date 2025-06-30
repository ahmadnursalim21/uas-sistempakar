<?php
require "../../middleware/admin.php";
require "../../database/database.php";

// Pastikan ada parameter id
if (!isset($_GET['id'])) {
    header("Location: index.php?message=error");
    exit;
}

$id_relasi = intval($_GET['id']);

// Hapus data relasi berdasarkan id_relasi
$sql = "DELETE FROM relasi_hobi_jurusan WHERE id_relasi = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_relasi);
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