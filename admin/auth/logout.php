<?php 
// mengaktifkan session php
$page = "";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if ($page == "logout") {
    if (isset($_SESSION['login-admin'])) {
        if (!isset($_POST['btn-logout-admin'])) {
            echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan');</script>";
            echo "<script>location='?page=dashboard';</script>";
            exit;
        }
        date_default_timezone_set('Asia/Jakarta');
        $username = $_SESSION['username'];
        $date = date("Y-m-d H:i:s");
        $con->query("UPDATE users SET last_login = '$date' WHERE username = '$username' ");
            // menghapus semua session
        unset($_SESSION['login-admin']);

        // mengalihkan halaman ke halaman login
        echo "<script>alert('Berhasil Logout');</script>";
        echo "<script>location='auth/login.php';</script>";
        exit;
    }
} else {
    session_start();
    if (isset($_SESSION['login-admin'])) {
        echo "<script>alert('Logout dulu');</script>";
        echo "<script>location='../?page=dashboard';</script>";
        exit;
    } else {
        echo "<script>alert('Harus Login Terlebih Dahulu');</script>";
        echo "<script>location='login.php';</script>";
        exit;
    }
}


?>