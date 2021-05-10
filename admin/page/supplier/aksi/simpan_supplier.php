<?php

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_telepon = $_POST['no_telepon'];
    $keterangan = $_POST['keterangan'];
    $status = 1;

    $query = $con->query("INSERT INTO supplier VALUES('$kode_supplier','$nama_supplier', '$no_telepon', '$keterangan', '$status')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=supplier';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=tambah-supplier';</script>";
    }

?>