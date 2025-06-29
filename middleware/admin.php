<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: http://localhost/project-php/project-2/index.php");
    exit;
}
