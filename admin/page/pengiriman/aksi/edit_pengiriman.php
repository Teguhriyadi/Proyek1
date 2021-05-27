<?php

    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=pengiriman';</script>";
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
            window.location.replace("?page=pengiriman");
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
            window.location.replace("?page=pengiriman");
        }, 3000);
    }
</script>

<?php

    $id_ongkir = $_POST['id_ongkir'];
    $nama_kota = $_POST['nama_kota'];
    $tarif = $_POST['tarif'];

    $query = $con->query("UPDATE pengiriman SET nama_kota = '$nama_kota', tarif = '$tarif' WHERE id_ongkir = '$id_ongkir'");

    if ($query != 0) {
        echo "<script>berhasil();</script>";
    } else {
        echo "<script>gagal();</script>";
    }

?>