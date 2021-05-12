<?php

    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=transaksi';</script>";
        exit;
    }

    $id_transaksi = $_POST['id_transaksi'];
    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d H:i:s");
    $status = $_POST['status'];

    $query = $con->query("UPDATE transaksi_barang SET stok = '$stok', tanggal = '$tanggal', status = '$status' WHERE id_transaksi = '$id_transaksi' ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=transaksi';</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=edit-transaksi&id_transaksi=$id_transaksi';</script>";
    }

?>