<?php

    $kode_barang = $_POST['kode_barang'];
    $id_kategori = $_POST['id_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    $query = $con->query("INSERT INTO barang VALUES('$kode_barang', '$id_kategori' ,'$nama_barang','$harga','$satuan','$keterangan')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=tambah-barang';</script>";
    }

?>