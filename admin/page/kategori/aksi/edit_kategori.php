<?php

    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = $con->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>location='?page=kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal di Ubah');</script>";
        echo "<script>location='?page=edit-kategori&id_kategori=$id_kategori';</script>";
    }

?>