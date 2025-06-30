<?php
session_start(); // Mulai session

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman login atau beranda
header("Location: http://localhost/uas-sistempakar-s6/login.php");
exit;