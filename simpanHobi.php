<?php
require "database/database.php";

// Ambil data dari form
$id_pengguna = $_POST['id_pengguna'];
$hobi_terpilih = $_POST['hobi'] ?? [];

// Hapus hobi lama (jika perlu)
$conn->query("DELETE FROM hobi_users WHERE id_pengguna = $id_pengguna");

// Simpan hobi baru
foreach ($hobi_terpilih as $id_hobi) {
    $stmt = $conn->prepare("INSERT INTO hobi_users (id_pengguna, id_hobi) VALUES (?, ?)");
    $stmt->bind_param("ii", $id_pengguna, $id_hobi);
    $stmt->execute();
}

echo "<script>alert('Hobi berhasil disimpan!'); window.location.href='dashboard.php';</script>";