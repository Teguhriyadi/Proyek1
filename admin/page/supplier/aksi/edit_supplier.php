<?php

    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=supplier';</script>";
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
            window.location.replace("?page=supplier");
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
            window.location.replace("?page=supplier");
        }, 3000);
    }
</script>
<?php

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_telepon = $_POST['no_telepon'];
    $keterangan = $_POST['keterangan'];

    $query = $con->query("UPDATE supplier SET nama_supplier = '$nama_supplier', no_telepon = '$no_telepon', keterangan = '$keterangan' WHERE kode_supplier = '$kode_supplier' ");

    if ($query != 0) {
        echo "<script>berhasil();</script>";
    } else {
        echo "<script>gagal();</script>";
    }

?>