<?php
include '../koneksi/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
    $result = mysqli_fetch_assoc($anggota);
    // Validasi form
    if (empty($nim) || empty($nama) || empty($kelas) || empty($jenis_kelamin)) {
        $error = "Harap lengkapi semua field.";
    } elseif ($nim == $result['nim']) {
        $error = "NIM sudah ada !!!";
    } else {
        // Hash password

        // Insert data anggota ke tabel "anggota"
        $sql = "INSERT INTO anggota (nim, nama, kelas, jenis_kelamin) VALUES ('$nim', '$nama', '$kelas', '$jenis_kelamin')";
        if (mysqli_query($koneksi, $sql)) {
            // Data anggota berhasil disimpan, redirect ke halaman dashboard anggota
            echo "<script>alert('Berhasil Menambahkan Anggota 😄')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            // header('Location: ../Dashboard/dashboard.php?page=dashboard');
            exit();
        } else {
            // Gagal menyimpan data anggota
            $error = "Terjadi kesalahan dalam menyimpan data anggota.";
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
    <link rel="stylesheet" href="../Tambah_admin/tambah_admin.css">
    <title>Tambah Admin</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Tambah Anggota</h1>
            <input type="text" placeholder="Masukkan NIM" name="nim">
            <input type="text" placeholder="Masukkan Nama" name="nama">
            <input type="text" placeholder="Masukkan Kelas" name="kelas">
            <input type="text" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin">
            <button type="submit">Tambah</button>
            <a href="../Dashboard/dashboard.php">Kembali</a>
        </form>
    </div>
</body>

</html>