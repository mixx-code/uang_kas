<?php
include '../koneksi/koneksi.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validasi form
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $error = "Harap lengkapi semua field.";
    } elseif ($password !== $confirmPassword) {
        $error = "Konfirmasi password tidak sesuai.";
    } else {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data admin ke tabel "admin"
        $sql = "INSERT INTO admin (nama_admin, username, password) VALUES ('$nama', '$username', '$hashedPassword')";
        if (mysqli_query($koneksi, $sql)) {
            // Data admin berhasil disimpan, redirect ke halaman dashboard admin
            echo "<script>alert('Berhasil Menambahkan Admin😄')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            // header('Location: ../Dashboard/dashboard.php?page=dashboard');
            exit();
        } else {
            // Gagal menyimpan data admin
            $error = "Terjadi kesalahan dalam menyimpan data admin.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah_admin.css">
    <title>Tambah Admin</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Tambah Admin</h1>
            <input type="text" placeholder="Nama" name="nama">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="password">
            <input type="text" placeholder="Konfirmasi Password" name="confirm_password">
            <button type="submit">Tambah</button>
            <a href="../Dashboard/dashboard.php">Kembali</a>
        </form>
    </div>
</body>

</html>