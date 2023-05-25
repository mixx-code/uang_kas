<?php
$kas_saat_ini = mysqli_query($koneksi, "SELECT SUM(minggu_1 + minggu_2 + minggu_3 + minggu_4) AS total FROM laporan_kas");
$data = mysqli_fetch_assoc($kas_saat_ini);
?>
<div class="sidebar">
    <ul>
        <li>
            SALDO KAS :<br>
            <?php
            if (mysqli_num_rows($kas_saat_ini) > 0) {
                echo 'Rp.' . $data['total'];
            } else {
                echo 'Rp.0';
            }
            ?>
        </li>
        <li><a href="../Dashboard/dashboard.php?page=dashboard">DASHBOARD</a></li>
        <li><a href="../Dashboard/dashboard.php?page=anggota">ANGGOTA</a></li>
        <li><a href="../Dashboard/dashboard.php?page=laporan">LAPORAN</a></li>
        <li><a href="../Dashboard/dashboard.php?page=laporan">PENGELUARAN</a></li>

        <?php if (isset($_SESSION["id_admin"])) : ?>
            <li><a href="">PAKAI UANG</a></li>
            <li><a href="../Tambah_admin/tambah_admin.php">TAMBAH ADMIN</a></li>
            <li><a href="../koneksi/logout.php">LOGOUT</a></li>
        <?php else : ?>
            <li><a href="../index.php">LOGIN</a></li>
        <?php endif ?>
    </ul>
</div>