<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>

<a href="http://localhost/uas-sistempakar-s6/admin" class="active"><i class="bi bi-house me-2"></i>Dashboard</a>
<a href="http://localhost/uas-sistempakar-s6/admin/hobi"><i class="bi bi-heart me-2"></i>Hobi</a>
<a href="http://localhost/uas-sistempakar-s6/admin/jurusan"><i class="bi bi-journal me-2"></i>Jurusan</a>
<a href="http://localhost/uas-sistempakar-s6/admin/relasi-hobi-jurusan"><i class="bi bi-journal me-2"></i>Relasi Hobi -
    Jurusan</a>
<a href="http://localhost/uas-sistempakar-s6/admin/users"><i class="bi bi-people me-2"></i>Pengguna</a>
<?php if (!isset($_SESSION['username'])): ?>
<li class="nav-item">
    <a class="nav-link" href="../login.php">Login</a>
</li>
<?php else: ?>
<li class="nav-item">
    <a class="nav-link" href="../logout.php">Logout</a>
</li>
<?php endif; ?>