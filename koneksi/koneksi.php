<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "uang_kas";
$koneksi = mysqli_connect($host, $user, $password, $dbname);
if (!$koneksi) {
    echo "KONEKSI ERROR";
    exit();
}
