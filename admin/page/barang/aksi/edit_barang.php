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

    $sql = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang' ");
    $data = $sql->fetch_array();
    $fotoBarang = $data['foto'];

    $id_kategori = $_POST['id_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];
    $foto_lama = $_POST["foto_lama"];

    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
            
        if ($fotoBarang != NULL) {
            if (file_exists("page/img/$foto_lama")) {
                unlink("page/img/$foto_lama");
            }
        }

        $namafile = $_FILES['foto']['name'];
        $ukuranfile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpname = $_FILES['foto']['tmp_name'];

        if ($error == 4) { // 4 adalah jumlah dari error
            echo "<script>alert('Pilih Gambar Dahulu');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Bukan Gambar');</script>";
        }
        if ($ukuranfile > 1000000) {
            echo "<script>alert('Ukuran Terlalu besar');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        
    }

    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, 'page/img/' . $namafilebaru);
        $query = $con->query("UPDATE barang SET id_kategori = '$id_kategori', nama_barang = '$nama_barang', harga = '$harga', satuan = '$satuan', keterangan = '$keterangan', foto = '$namafilebaru' WHERE kode_barang = '$kode_barang' ");
    } else {
        $query = $con->query("UPDATE barang SET id_kategori = '$id_kategori', nama_barang = '$nama_barang', harga = '$harga', satuan = '$satuan', keterangan = '$keterangan' WHERE kode_barang = '$kode_barang' ");
    }

    
    if ($query != 0) {
        echo "<script>berhasil();</script>";
    } else {
        echo "<script>gagal();</script>";
    }

?>