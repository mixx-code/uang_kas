<?php
include '../koneksi/koneksi.php';
$kas_saat_ini = mysqli_query($koneksi, "SELECT SUM(minggu_1 + minggu_2 + minggu_3 + minggu_4) AS total FROM laporan_kas");
$data = mysqli_fetch_assoc($kas_saat_ini);
?>
<div class="sidebar">
    <ul>
        <li>
            SALDO KAS :<br>
            <?= 'Rp.' . $data['total'] ?>
        </li>
        <li><a href="../Dashboard_admin/dashboard_admin.php?page=dashboard">DASHBOARD</a></li>
        <li><a href="../Dashboard_admin/dashboard_admin.php?page=laporan">LAPORAN</a></li>
        <li><a href="">PAKAI UANG</a></li>
        <li><a href="../Dashboard_admin/dashboard_admin.php?page=anggota">ANGGOTA</a></li>
        <li><a href="../Tambah_admin/tambah_admin.php">TAMBAH ADMIN</a></li>
        <li><a href="">LOGOUT</a></li>
    </ul>
</div>