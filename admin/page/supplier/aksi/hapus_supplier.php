<?php

    $kode_supplier = $_GET['kode_supplier'];
    
    $query = $con->query("DELETE FROM supplier WHERE kode_supplier = '$kode_supplier' ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>location='?page=supplier';</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>location='?page=supplier';</script>";
    }

?>