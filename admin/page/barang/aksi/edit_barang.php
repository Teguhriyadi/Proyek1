<?php

    $kode_barang = $_POST['kode_barang'];
    $id_kategori = $_POST['id_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    $query = $con->query("UPDATE barang SET id_kategori = '$id_kategori', nama_barang = '$nama_barang', harga = '$harga', satuan = '$satuan', keterangan = '$keterangan' WHERE kode_barang = '$kode_barang' ");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=barang';</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=edit-barang&kode_barang=$kode_barang';</script>";
    }

?>