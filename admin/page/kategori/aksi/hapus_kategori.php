<?php

    if (!isset($_POST['btn-hapus'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan Akses!');</script>";
        echo "<script>location='?page=kategori';</script>";
        exit;
    } else {
        $id_kategori = $_POST['id_kategori'];

        $query = $con->query("DELETE FROM kategori WHERE id_kategori = $id_kategori");

        if ($query != 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            echo "<script>location='?page=kategori';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            echo "<script>location='?page=kategori';</script>";
            exit;
        }
    }
?>