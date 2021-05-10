<?php
    
    $id = $_GET['id'];
    
    $query = $con->query("DELETE FROM users WHERE id = $id");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>location='?page=users';</script>";
    } else {
        echo "<script>alert('Data Gagal di Hapus');</script>";
        echo "<script>location='?page=users';</script>";
    }

?>