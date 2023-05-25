<?php
session_start();

// Hapus semua data session
session_destroy();

// Redirect ke halaman login
echo "<script>alert('Selamat tinggal')</script>";
echo "<meta http-equiv='refresh' content='0; url= ../index.php'>";
exit();
