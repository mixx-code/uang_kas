<?php
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY nama ASC");
$kas = mysqli_query($koneksi, "SELECT anggota.nama, anggota.nim, kas.minggu_1, kas.minggu_2, kas.minggu_3, kas.minggu_4, kas.id_admin, kas.tanggal_bayar
FROM anggota
LEFT JOIN kas ON anggota.nim = kas.nim
ORDER BY anggota.nama ASC");
// Mendapatkan tanggal saat ini
$tanggalSekarang = date('Y-m-d');

// // Query untuk mengambil data dari tabel anggota dan kas
// $kas = mysqli_query($koneksi, "SELECT anggota.nim, kas.minggu_1, kas.minggu_2, kas.minggu_3, kas.minggu_4, kas.id_admin, kas.tanggal_bayar
// FROM anggota
// LEFT JOIN kas ON anggota.nim = kas.nim
// ORDER BY anggota.nama ASC");
if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $laporan = mysqli_query($koneksi, "SELECT anggota.nama, laporan_kas.nim, SUM(laporan_kas.minggu_1 + laporan_kas.minggu_2 + laporan_kas.minggu_3 + laporan_kas.minggu_4) AS total_bayar FROM anggota LEFT JOIN laporan_kas ON anggota.nim = laporan_kas.nim WHERE DATE_FORMAT(laporan_kas.tanggal_bayar, '%m') = '$bulan' GROUP BY anggota.nama ORDER BY anggota.nama ASC");
}

if (date('m') != date('m', strtotime('+1 day'))) {
    // Perulangan untuk mengunggah data ke tabel laporan
    while ($data = mysqli_fetch_assoc($kas)) {
        $nim = $data['nim'];
        $minggu1 = $data['minggu_1'];
        $minggu2 = $data['minggu_2'];
        $minggu3 = $data['minggu_3'];
        $minggu4 = $data['minggu_4'];
        $idAdmin = $data['id_admin'];
        $tanggal_bayar = $data['tanggal_bayar'];

        // Query INSERT untuk mengunggah data ke tabel laporan
        $query = "INSERT INTO laporan_kas ( nim, minggu_1, minggu_2, minggu_3, minggu_4, id_admin, tanggal_bayar)
              VALUES ('$nim', '$minggu1', '$minggu2', '$minggu3', '$minggu4', '$idAdmin', '$tanggal_bayar')";

        // Eksekusi query INSERT
        $result = mysqli_query($koneksi, $query);
    }
    if ($result) {
        $deleteQuery = "DELETE FROM kas";
        mysqli_query($koneksi, $deleteQuery);
    }
}

?>
<?php if ($page == 'dashboard') : ?>
    <!-- <?php
            echo date('m');
            echo date('m', strtotime('+1 day'))
            ?> -->
    <?php if (isset($_SESSION["id_admin"])) : ?>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>MINGGU 1</th>
                    <th>MINGGU 2</th>
                    <th>MINGGU 3</th>
                    <th>MINGGU 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($kas) {
                    if (mysqli_num_rows($kas) > 0) {
                        $i = 1;
                        // Tampilkan data
                        while ($data = mysqli_fetch_assoc($kas)) {
                ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <?= $data['minggu_1'] == 0 ? '<a class="btn-bayar" href="../Dashboard/dashboard.php?page=bayar-kas&minggu=1&nim=' . $data["nim"] . '">bayar sekarang</a>' : ($data['minggu_2'] > 0 ? $data['minggu_1'] : '<a onClick="return confirm(`Apa anda mau batal bayar kas ini?`)" href="../koneksi/batal_bayar.php?minggu=1&nim=' . $data["nim"] . '">' . 'Rp.' . $data['minggu_1'] . '</a>') ?>
                                </td>
                                <td><?= $data['minggu_1'] == 0 ? '<--' : ($data['minggu_2'] > 0 ? ($data['minggu_3'] > 0 ? $data['minggu_2'] : '<a onClick="return confirm(`Apa anda mau batal bayar kas ini?`)" href="../koneksi/batal_bayar.php?minggu=2&nim=' . $data["nim"] . '">' . 'Rp.' . $data['minggu_2'] . '</a>') : '<a class="btn-bayar" href="../Dashboard/dashboard.php?page=bayar-kas&minggu=2&nim=' . $data["nim"] . '">bayar sekarang</a>') ?></td>
                                <td><?= ($data['minggu_1'] == 0 || $data['minggu_2'] == 0) ? '<--' : ($data['minggu_3'] > 0 ? ($data['minggu_4'] > 0 ? $data['minggu_3'] : '<a onClick="return confirm(`Apa anda mau batal bayar kas ini?`)" href="../koneksi/batal_bayar.php?minggu=3&nim=' . $data["nim"] . '">' . 'Rp.' . $data['minggu_3'] . '</a>') : '<a class="btn-bayar" href="../Dashboard/dashboard.php?page=bayar-kas&minggu=3&nim=' . $data["nim"] . '">bayar sekarang</a>') ?></td>
                                <td><?= ($data['minggu_1'] == 0 || $data['minggu_3'] == 0) ? '<--' : ($data['minggu_4'] > 0 ? ($data['minggu_4'] > 0 ? '<a onClick="return confirm(`Apa anda mau batal bayar kas ini?`)" href="../koneksi/batal_bayar.php?minggu=4&nim=' . $data["nim"] . '">' . 'Rp.' . $data['minggu_4'] . '</a>' : '') : '<a class="btn-bayar" href="../Dashboard/dashboard.php?page=bayar-kas&minggu=4&nim=' . $data["nim"] . '">bayar sekarang</a>') ?></td>
                            </tr>

                <?php
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>BELUM ADA YANG BAYAR KAS</td></tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                } ?>
            </tbody>
        </table>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>MINGGU 1</th>
                    <th>MINGGU 2</th>
                    <th>MINGGU 3</th>
                    <th>MINGGU 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($kas) {
                    if (mysqli_num_rows($kas) > 0) {
                        $i = 1;
                        // Tampilkan data
                        while ($data = mysqli_fetch_assoc($kas)) {
                ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td>
                                    <?= $data['minggu_1'] == 0 ? '<p class="btn-belum-bayar">Belum Bayar</p>' : 'Rp. ' . $data['minggu_1'] ?>
                                </td>
                                <td><?= $data['minggu_1'] == 0 ? '<p class="btn-belum-bayar">Belum Bayar</p>' : ($data['minggu_2'] > 0 ? 'Rp.' . $data['minggu_2'] : '<p class="btn-belum-bayar">Belum Bayar</p>') ?></td>
                                <td><?= ($data['minggu_1'] == 0 || $data['minggu_2'] == 0) ? '<p class="btn-belum-bayar">Belum Bayar</p>' : ($data['minggu_3'] > 0 ? 'Rp.' . $data['minggu_3'] : '<p class="btn-belum-bayar">Belum Bayar</p>') ?></td>
                                <td><?= ($data['minggu_1'] == 0 || $data['minggu_3'] == 0) ? '<p class="btn-belum-bayar">Belum Bayar</p>' : ($data['minggu_4'] > 0 ? 'Rp.' . $data['minggu_4'] : '<p class="btn-belum-bayar">Belum Bayar</p>') ?></td>
                            </tr>

                <?php
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>BELUM ADA YANG BAYAR KAS</td></tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                } ?>
            </tbody>
        </table>
    <?php endif ?>

<?php elseif ($page == 'anggota') : ?>
    <table>
        <thead>
            <tr>
                <?php if (isset($_SESSION["id_admin"])) : ?>
                    <th colspan="6" style="text-align: start;"><a style="margin-left: 20px;" href="../Tambah_anggota/tambah_anggota.php">Tambah Anggota</a></th>
                <?php endif ?>
            </tr>
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>JENIS KELAMIN</th>
                <?php if (isset($_SESSION["id_admin"])) : ?>
                    <th>HANDLE</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($anggota) > 0) : ?>
                <?php $i = 1; ?>
                <?php while ($data = mysqli_fetch_assoc($anggota)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['kelas'] ?></td>
                        <td><?= $data['jenis_kelamin'] ?></td>
                        <?php if (isset($_SESSION["id_admin"])) : ?>
                            <td><a href="" class="edit">Edit</a><a href="" class="delete">Delete</a></td>
                        <?php endif ?>

                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">TIDAK MEMILIKI ANGGOTA</td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
<?php elseif ($page == 'laporan') : ?>
    <table>
        <thead>
            <tr>
                <td colspan="3" style="text-align: end;">
                    <form method="POST" action="">
                        <div style="margin-right: 50px;">
                            <select name="bulan" id="bulan">
                                <option value="01" <?= isset($_POST['bulan']) && $_POST['bulan'] == '01' ? 'selected' : '' ?>>Januari</option>
                                <option value="02" <?= isset($_POST['bulan']) && $_POST['bulan'] == '02' ? 'selected' : '' ?>>Februari</option>
                                <option value="03" <?= isset($_POST['bulan']) && $_POST['bulan'] == '03' ? 'selected' : '' ?>>Maret</option>
                                <option value="04" <?= isset($_POST['bulan']) && $_POST['bulan'] == '04' ? 'selected' : '' ?>>April</option>
                                <option value="05" <?= isset($_POST['bulan']) && $_POST['bulan'] == '05' ? 'selected' : '' ?>>Mei</option>
                                <option value="06" <?= isset($_POST['bulan']) && $_POST['bulan'] == '06' ? 'selected' : '' ?>>Juni</option>
                                <option value="07" <?= isset($_POST['bulan']) && $_POST['bulan'] == '07' ? 'selected' : '' ?>>Juli</option>
                                <option value="08" <?= isset($_POST['bulan']) && $_POST['bulan'] == '08' ? 'selected' : '' ?>>Agustus</option>
                                <option value="09" <?= isset($_POST['bulan']) && $_POST['bulan'] == '09' ? 'selected' : '' ?>>September</option>
                                <option value="10" <?= isset($_POST['bulan']) && $_POST['bulan'] == '10' ? 'selected' : '' ?>>Oktober</option>
                                <option value="11" <?= isset($_POST['bulan']) && $_POST['bulan'] == '11' ? 'selected' : '' ?>>November</option>
                                <option value="12" <?= isset($_POST['bulan']) && $_POST['bulan'] == '12' ? 'selected' : '' ?>>Desember</option>
                            </select>
                            <button type="submit" name="submit">Pilih</button>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>JUMLAH BAYAR KAS</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($laporan) && mysqli_num_rows($laporan) > 0) : ?>
                <?php $i = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($laporan)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['total_bayar'] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">TIDAK ADA DATA KAS PADA BULAN INI</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
<?php endif ?>