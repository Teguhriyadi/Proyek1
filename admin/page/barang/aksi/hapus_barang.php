<?php

    $kode_barang = $_GET['kode_barang'];

    $query = $con->query("DELETE FROM barang WHERE kode_barang = '$kode_barang'");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>location='?page=barang';</script>";
    }

?>