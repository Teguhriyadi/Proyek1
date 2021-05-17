<?php

    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=barang';</script>";
        exit;
    }

?>

<script type="text/javascript">
    function berhasil() {
        setTimeout(function() {
            swal({
                title : 'BERHASIL',
                text : 'Data Berhasil di Ubah',
                type : 'success',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=barang");
        }, 3000);
    }

    function gagal() {
        setTimeout(function() {
            swal({
                title : 'GAGAL',
                text : 'Data Gagal di Ubah',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=barang");
        }, 3000);
    }
</script>

<?php
    
    $kode_barang = $_POST['kode_barang'];
    $id_kategori = $_POST['id_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    $query = $con->query("UPDATE barang SET id_kategori = '$id_kategori', nama_barang = '$nama_barang', harga = '$harga', satuan = '$satuan', keterangan = '$keterangan' WHERE kode_barang = '$kode_barang' ");

    if ($query != 0) {
        echo "<script>berhasil();</script>";
    } else {
        echo "<script>gagal();</script>";
    }

?>