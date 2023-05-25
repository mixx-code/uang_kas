<?php
include '../koneksi/koneksi.php';
@$page =  $_GET['page'];
if ($page == '') {
    // $page =  'dashboard';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $page ?></title>
</head>

<body>
    <div class="container">
        <?php include '../Components/navbar.php'; ?>
        <div class="content">
            <?php include '../Components/sidebar.php' ?>
            <div class="main">
                <h1><?= strtoupper($page)  ?></h1>

                <div class="tabel">
                    <?php
                    if (!empty($page)) {
                        switch ($page) {
                            case 'dashboard':
                                include '../Components/tabel.php';
                                break;
                            case 'anggota':
                                include '../Components/tabel.php';
                                break;
                            case 'laporan':
                                include '../Components/tabel.php';
                                break;
                            case 'bayar-kas':
                                include '../Components/bayar_kas.php';
                                break;
                            default:
                                include './dashboard.php?page=dashboard';
                                break;
                        }
                    } else {
                        include './dashboard.php?page=dashboard';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>