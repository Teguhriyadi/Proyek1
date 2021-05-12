<?php

    if (!isset($_POST['btn-hapus'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan Akses!');</script>";
        echo "<script>location='?page=supplier';</script>";
        exit;
    } else {
        $kode_supplier = $_POST['kode_supplier'];

        $query = $con->query("DELETE FROM supplier WHERE kode_supplier = '$kode_supplier' ");

        if ($query != 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            echo "<script>location='?page=supplier';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            echo "<script>location='?page=supplier';</script>";
            exit;
        }
    }
?>