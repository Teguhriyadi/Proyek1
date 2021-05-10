<?php
    $kode_barang = $_POST['kode_barang'];
    $stok = $_POST['stok'];
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d H:i:s");
    $status = 1;

    $query = $con->query("INSERT INTO transaksi_barang VALUES ('','$kode_barang','$stok','$tanggal','$status')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    }
?>