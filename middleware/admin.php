<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: http://localhost/uas-sistempakar-s6/login.php");
    exit;
}