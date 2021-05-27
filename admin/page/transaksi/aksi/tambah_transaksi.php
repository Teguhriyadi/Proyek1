<?php

    if (!isset($_POST['btn-tambah'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=barang';</script>";
        exit;
    }

    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d H:i:s");
    $status = 1;
    $kode_supplier = $_POST['kode_supplier'];
    if ($kode_supplier == "") {
        $kodeSup = 'NULL';
    } else {
        $kodeSup = $_POST['kode_supplier'];
    }

    $query = $con->query("INSERT INTO transaksi_barang VALUES ('','$kode_barang', '$stok','$tanggal','$status', '$kodeSup')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    }
?>