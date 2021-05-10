<?php 
// mengaktifkan session php
// session_start();

if (!isset($_SESSION['level'])) {
    echo "<script>alert('Harus Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
} else {
    // menghapus semua session
    session_destroy();

    // mengalihkan halaman ke halaman login
    echo "<script>alert('Berhasil Logout');</script>";
    echo "<script>location='auth/login.php';</script>";
}

?>