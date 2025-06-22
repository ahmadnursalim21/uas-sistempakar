<?php
session_start();
require "../database/database.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    // Hindari SQL injection (lebih baik pakai prepared statement, tapi ini masih pakai escape dasar)
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password']; // password terenkripsi di DB

        if (password_verify($password, $hashed_password)) {
            // Simpan session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];

            // Redirect ke halaman utama
            header("Location: ../admin/");
            exit;
        } else {
            // Password salah
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php");
            exit;
        }
    } else {
        // Email tidak ditemukan
        $_SESSION['error'] = "Email tidak ditemukan!";
        header("Location: login.php");
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="min-width: 350px;">
            <?php if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            } ?>
            <h3 class="text-center mb-3">Login Akun</h3>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email"
                        placeholder="Masukan email anda" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukan password anda"
                        name="password">
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center mt-3">
                    <p>Apakah kamu belum mempunyai akun ? <a href="register.php">Register
                            sekrang</a> </p>
                </div>
            </form>
        </div>
    </div>

    <script src="public/bootstrap/js/bootstrap.js"></script>
</body>

</html>