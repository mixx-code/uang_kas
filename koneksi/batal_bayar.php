<?php
include './koneksi.php';
$id_admin = $_SESSION['id_admin'];
$minggu = $_GET['minggu'];
$nim = $_GET['nim'];

if ($minggu == 1) {
    $query = "DELETE FROM kas WHERE nim = '$nim' ";
    $bayar_kas = mysqli_query($koneksi, $query);

    if ($bayar_kas) {
        echo "<script>alert('Berhasil Membatalkan Bayar Kas')</script>";
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Membatalkan Bayar Kas')</script>";
        echo "Error: " . mysqli_error($koneksi);
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    }
} elseif ($minggu == 2) {
    $query = "UPDATE kas SET minggu_2 = 0 WHERE nim = '$nim' ";
    $bayar_kas = mysqli_query($koneksi, $query);

    if ($bayar_kas) {
        echo "<script>alert('Berhasil Membatalkan Bayar Kas')</script>";
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Membatalkan Bayar Kas')</script>";
        echo "Error: " . mysqli_error($koneksi);
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    }
} elseif ($minggu == 3) {
    $query = "UPDATE kas SET minggu_3 = 0 WHERE nim = '$nim' ";
    $bayar_kas = mysqli_query($koneksi, $query);

    if ($bayar_kas) {
        echo "<script>alert('Berhasil Membatalkan Bayar Kas')</script>";
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Membatalkan Bayar Kas')</script>";
        echo "Error: " . mysqli_error($koneksi);
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    }
} elseif ($minggu == 4) {
    $query = "UPDATE kas SET minggu_4 = 0 WHERE nim = '$nim' ";
    $bayar_kas = mysqli_query($koneksi, $query);

    if ($bayar_kas) {
        echo "<script>alert('Berhasil Membatalkan Bayar Kas')</script>";
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    } else {
        echo "<script>alert('Gagal Membatalkan Bayar Kas')</script>";
        echo "Error: " . mysqli_error($koneksi);
        echo "<script>window.location.href='../Dashboard/dashboard.php?page=dashboard'</script>";
        exit();
    }
}
