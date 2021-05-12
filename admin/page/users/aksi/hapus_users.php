<?php

    if (!isset($_POST['btn-hapus'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan Akses!');</script>";
        echo "<script>location='?page=users';</script>";
        exit;
    } else {
        $id = $_POST['id'];

        $query = $con->query("DELETE FROM users WHERE id = $id");

        if ($query != 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            echo "<script>location='?page=users';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            echo "<script>location='?page=userss';</script>";
            exit;
        }
    }
?>