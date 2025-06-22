<?php
require "database/database.php";

$id_pengguna = $_POST['id_pengguna'];
$hobi_terpilih = $_POST['hobi'] ?? [];


// Cek apakah pengguna valid di tabel users
$cek = $conn->prepare("SELECT id FROM users WHERE id = ?");
$cek->bind_param("i", $id_pengguna);
$cek->execute();
$cek->store_result();

if ($cek->num_rows === 0) {
    echo "<script>alert('Pengguna tidak ditemukan.'); window.location.href='pilihHobi.php';</script>";
    exit;
}

// Hapus hobi lama dengan prepared statement
$stmtDel = $conn->prepare("DELETE FROM hobi_users WHERE id_pengguna = ?");
$stmtDel->bind_param("i", $id_pengguna);
$stmtDel->execute();

// Simpan hobi baru
$stmt = $conn->prepare("INSERT INTO hobi_users (id_pengguna, id_hobi) VALUES (?, ?)");
foreach ($hobi_terpilih as $id_hobi) {
    $stmt->bind_param("ii", $id_pengguna, $id_hobi);
    $stmt->execute();
}




echo "<script>alert('Hobi berhasil disimpan!'); window.location.href='rekomendasiJurusan.php';</script>";