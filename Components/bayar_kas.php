<?php
$minggu = $_GET['minggu'];
// $nim = $_GET['nim'];
// $id_admin = $_SESSION['id_admin'];
// echo $nim;
// echo $id_admin;
?>
<?php if ($minggu == 1) : ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uang = $_POST['uang'];
        $tanggal_bayar = $_POST['tanggal_bayar'];
        $nim = $_GET['nim']; // Ubah sesuai dengan parameter yang diperlukan
        $id_admin = $_SESSION['id_admin'];

        // Memasukkan data ke dalam tabel kas
        $query = "INSERT INTO kas (nim, minggu_1, id_admin, tanggal_bayar) VALUES ('$nim', '$uang', '$id_admin', '$tanggal_bayar')";
        $bayar_kas = mysqli_query($koneksi, $query);

        if ($bayar_kas) {
            echo "<script>alert('Pembayaran berhasil.')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        } else {
            echo "<script>alert('Pembayaran Gagal.')</script>";
            echo "Error: " . mysqli_error($koneksi);
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        }
    }
    ?>
    <div class="form">
        <h2>Bayar kas Minggu 1</h2>
        <form action="" method="post">
            <input name="uang" type="number" placeholder="masukan nomilan uang">
            <input name="tanggal_bayar" type="date">
            <button class="btn-submit" type="submit">Bayar</button>
        </form>
    </div>
<?php elseif ($minggu == 2) : ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uang = $_POST['uang'];
        $tanggal_bayar = $_POST['tanggal_bayar'];
        $nim = $_GET['nim']; // Ubah sesuai dengan parameter yang diperlukan
        $id_admin = $_SESSION['id_admin'];

        // Memasukkan data ke dalam tabel kas
        $query = "UPDATE kas SET minggu_2 = '$uang', tanggal_bayar = '$tanggal_bayar', id_admin = '$id_admin' WHERE nim = '$nim' ";
        $bayar_kas = mysqli_query($koneksi, $query);

        if ($bayar_kas) {
            echo "<script>alert('Pembayaran berhasil.')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        } else {
            echo "<script>alert('Pembayaran Gagal.')</script>";
            echo "Error: " . mysqli_error($koneksi);
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        }
    }
    ?>
    <div class="form">
        <h2>Bayar kas Minggu 2</h2>
        <form action="" method="post">
            <input name="uang" type="number" placeholder="masukan nomilan uang">
            <input name="tanggal_bayar" type="date">
            <button class="btn-submit" type="submit">Bayar</button>
        </form>
    </div>
<?php elseif ($minggu == 3) : ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uang = $_POST['uang'];
        $tanggal_bayar = $_POST['tanggal_bayar'];
        $nim = $_GET['nim']; // Ubah sesuai dengan parameter yang diperlukan
        $id_admin = $_SESSION['id_admin'];

        // Memasukkan data ke dalam tabel kas
        $query = "UPDATE kas SET minggu_3 = '$uang', tanggal_bayar = '$tanggal_bayar', id_admin = '$id_admin' WHERE nim = '$nim' ";
        $bayar_kas = mysqli_query($koneksi, $query);

        if ($bayar_kas) {
            echo "<script>alert('Pembayaran berhasil.')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        } else {
            echo "<script>alert('Pembayaran Gagal.')</script>";
            echo "Error: " . mysqli_error($koneksi);
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        }
    }
    ?>
    <div class="form">
        <h2>Bayar kas Minggu 3</h2>
        <form action="" method="post">
            <input name="uang" type="number" placeholder="masukan nomilan uang">
            <input name="tanggal_bayar" type="date">
            <button class="btn-submit" type="submit">Bayar</button>
        </form>
    </div>
<?php else : ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uang = $_POST['uang'];
        $tanggal_bayar = $_POST['tanggal_bayar'];
        $nim = $_GET['nim']; // Ubah sesuai dengan parameter yang diperlukan
        $id_admin = $_SESSION['id_admin'];

        // Memasukkan data ke dalam tabel kas
        $query = "UPDATE kas SET minggu_4 = '$uang', tanggal_bayar = '$tanggal_bayar', id_admin = '$id_admin' WHERE nim = '$nim' ";
        $bayar_kas = mysqli_query($koneksi, $query);

        if ($bayar_kas) {
            echo "<script>alert('Pembayaran berhasil.')</script>";
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        } else {
            echo "<script>alert('Pembayaran Gagal.')</script>";
            echo "Error: " . mysqli_error($koneksi);
            echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
            exit();
        }
    }
    ?>
    <div class="form">
        <h2>Bayar kas Minggu 4</h2>
        <form action="" method="post">
            <input name="uang" type="number" placeholder="masukan nomilan uang">
            <input name="tanggal_bayar" type="date">
            <button class="btn-submit" type="submit">Bayar</button>
        </form>
    </div>
<?php endif ?>