<?php

    if (!isset($_POST['btn-hapus'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan Akses!');</script>";
        echo "<script>location='?page=kategori';</script>";
        exit;
    } else {
        $kode_barang = $_POST['kode_barang'];

        $query = $con->query("DELETE FROM barang WHERE kode_barang = '$kode_barang' ");

        if ($query != 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            echo "<script>location='?page=barang';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            echo "<script>location='?page=barang';</script>";
            exit;
        }
    }
?>