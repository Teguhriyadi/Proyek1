<?php

    date_default_timezone_set('Asia/Jakarta');
    $username = strtolower(stripslashes($_POST['username']));
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    $last_login = NULL;
    $level = $_POST['level'];

    // cek username sudah ada atau belum
    $result = $con->query("SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result) > 0) {
        echo "<script>alert('Username sudah terdaftar');</script>";
        echo "<script>location='?page=users';</script>";
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
        echo "<script>location='?page=users';</script>";
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    $query = $con->query("INSERT INTO users VALUES ('','$username', '$email', '$password', '$created_at', '$updated_at','$last_login','$level') ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=users';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=users';</script>";
    }

?>