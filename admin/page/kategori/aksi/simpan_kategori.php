<?php

    $nama_kategori = $_POST['nama_kategori'];

    $query = $con->query("INSERT INTO kategori VALUES ('','$nama_kategori')");
    
    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=tambah-kategori';</script>";
    }

?>