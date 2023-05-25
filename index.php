<?php
include './koneksi/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // mengambil data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // mencari data pengguna pada tabel user
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // memverifikasi password
        if (password_verify($password, $row["password"])) {
            // menyimpan informasi login ke session
            $_SESSION["id_admin"] = $row["id_admin"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["nama_admin"] = $row["nama_admin"];

            // redirect ke halaman utama setelah login
            echo "<script>alert('Selamat datang " . $username . " 🫡')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ./Dashboard/dashboard.php?page=dashboard'>";
            exit();
        } else {
            // jika password tidak cocok
            echo "<script>alert('password salah !!!')</script>";
            echo "<meta http-equiv='refresh' content='0; url= ./index.php'>";
        }
    } else {
        // jika username tidak ditemukan
        echo "<script>alert('username salah !!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url= ./index.php'>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Login</h1>
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <button type="submit">Login</button>
            <a href="./Dashboard/dashboard.php?page=dashboard">Masuk Sebagai Tamu</a>
        </form>
    </div>
</body>

</html>