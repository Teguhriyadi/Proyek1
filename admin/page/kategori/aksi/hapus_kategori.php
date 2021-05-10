<?php
    $id_kategori = $_GET['id_kategori'];

    $query = $con->query("DELETE FROM kategori WHERE id_kategori = $id_kategori");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>location='?page=kategori';</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>location='?page=kategori';</script>";
    }
?>