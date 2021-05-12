<?php

    if (!isset($_POST['btn-hapus'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Sembarangan Akses!');</script>";
        echo "<script>location='?page=transaksi';</script>";
        exit;
    } else {
        $id_transaksi = $_POST['id_transaksi'];

        $query = $con->query("DELETE FROM transaksi_barang WHERE id_transaksi = $id_transaksi");

        if ($query != 0) {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
            echo "<script>location='?page=transaksi';</script>";
            exit;
        } else {
            echo "<script>alert('Data Gagal di Hapus');</script>";
            echo "<script>location='?page=transaksi';</script>";
            exit;
        }
    }
?>