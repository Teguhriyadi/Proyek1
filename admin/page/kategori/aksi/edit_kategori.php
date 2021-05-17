<?php

    if (!isset($_POST['btn-edit'])) {
        echo "<script>alert('Maaf, Anda Tidak Boleh Akses Sembarangan');</script>";
        echo "<script>location='?page=kategori';</script>";
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
            window.location.replace("?page=kategori");
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
            window.location.replace("?page=kategori");
        }, 3000);
    }
</script>

<?php

    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = $con->query("UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");

    if ($query != 0) {
        echo "<script>berhasil();</script>";
    } else {
        echo "<script>gagal();</script>";
    }

?>