<?php
require "../database/database.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$username','$email','$hash_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: login.php");
    } else {
        header("Location: register.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Page</title>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="min-width: 350px;">
            <h3 class="text-center mb-3">Register Akun</h3>
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="username" required
                        placeholder="Masukan nama anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        placeholder="Masukan email anda">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="Masukan password anda">
                </div>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="text-center mt-3">
                    <p>Sudah mempunyai akun? <a href="login.php">Login sekarang</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="../public/bootstrap/js/bootstrap.js"></script>
</body>

</html>