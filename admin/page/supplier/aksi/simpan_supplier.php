<?php

    if (!isset($_POST['btn-simpan'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=supplier';</script>";
        exit;
    }

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_telepon = $_POST['no_telepon'];
    $keterangan = $_POST['keterangan'];
    $status = 1;

    $query = $con->query("INSERT INTO supplier VALUES('$kode_supplier','$nama_supplier', '$no_telepon', 'Data Supplier $keterangan', '$status')");

    if ($query != 0) {
        echo "<script>alert('Data Berhasil di Tambahkan');</script>";
        echo "<script>location='?page=supplier';</script>";
        exit;
    } else {
        echo "<script>alert('Data Gagal di Tambahkan');</script>";
        echo "<script>location='?page=supplier';</script>";
        exit;
    }

?>