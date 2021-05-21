<?php

    if (!isset($_POST['btn-kurangi'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=barang';</script>";
        exit;
    }

    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d H:i:s");
    $status = 0;

    $query = $con->query("INSERT INTO transaksi_barang VALUES ('','$kode_barang', NULL ,'$stok','$tanggal','$status', 'NULL')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    }
?>