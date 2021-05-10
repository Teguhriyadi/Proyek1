<?php

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_telepon = $_POST['no_telepon'];
    $keterangan = $_POST['keterangan'];

    $query = $con->query("UPDATE supplier SET nama_supplier = '$nama_supplier', no_telepon = '$no_telepon', keterangan = '$keterangan' WHERE kode_supplier = '$kode_supplier' ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=supplier';</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=edit-supplier&kode_supplier=$kode_supplier';</script>";
    }

?>