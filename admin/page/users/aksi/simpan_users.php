<?php

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $created_at = date("Y-m-d H:i:s");
    $upated_at = date("Y-m-d H:i:s");
    $last_login = date("Y-m-d H:i:s");
    $level = $_POST['level'];

    $query = $con->query("INSERT INTO users VALUES('','$username','$email','$password','$created_at','$upated_at','$last_login','$level')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=users';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=tambah-users';</script>";
    }

?>