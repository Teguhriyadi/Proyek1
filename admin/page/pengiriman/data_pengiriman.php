<?php

    if (!defined('access')) {
        echo "<script>alert('Maaf, Anda Tidak Berhak Masuk Ke Halaman Ini');</script>";
        echo "<script>window.location.replace('../../?page=dashboard');</script>";
        exit;
    }

?>
<script type="text/javascript">
    function editPengiriman(id_ongkir) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/pengiriman/edit-pengiriman.php",
            type : "POST",
            data : { id_ongkir : id_ongkir },
            success : function (data) {
                $("#modal-update").html(data);
                return true;
            }
        })
    }

    function berhasil() {
        setTimeout(function() {
            swal({
                title : 'BERHASIL',
                text : 'Data Berhasil di Tambahkan',
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
                text : 'Data Gagal di Tambahkan',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=pengiriman");
        }, 3000);
    }

    function berhasil_hapus() {
        setTimeout(function() {
            swal({
                title : 'BERHASIL',
                text : 'Data Berhasil di Hapus',
                type : 'success',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=pengiriman");
        }, 3000);
    }

    function gagal_hapus() {
        setTimeout(function() {
            swal({
                title : 'GAGAL',
                text : 'Data Gagal di Hapus',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=pengiriman");
        }, 3000);
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-bars"></i> Data pengiriman</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data pengiriman</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama pengiriman</th>
                            <th class="text-center">Tarif</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM pengiriman");
                        $bgcolor = "";

                        ?>
                        <?php foreach ($query as $data_pengiriman) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td><?php echo $data_pengiriman['nama_kota']; ?></td>
                                <td class="text-center">Rp. <?php echo number_format($data_pengiriman['tarif']); ?></td>
                                <td class="text-center">
                                    <button id="btn-edit-pengiriman" onclick="editPengiriman(<?php echo $data_pengiriman['id_ongkir'] ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <form class="d-inline" method="POST" >
                                        <input type="hidden" name="id_ongkir" value="<?php echo $data_pengiriman['id_ongkir'] ?>">
                                        <button onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" name="btn-hapus" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kota"> Nama Kota </label>
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Masukkan Nama Kota" autocomplete="off">
                    </div>
                    <div class="form-group">
                    	<label for="tarif"> Tarif </label>
                    	<input type="number" class="form-control" id="tarif" name="tarif" placeholder="Masukkan Tarif" autocomplete="off" min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Update Data -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-pengiriman">
                <div class="modal-body" id="modal-update">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Fungsi Tambah pengiriman -->
<?php
    if (isset($_POST['btn-simpan'])) {
        $nama_kota = $_POST['nama_kota'];
        $tarif = $_POST['tarif'];

        $result = $con->query("SELECT nama_kota FROM pengiriman WHERE nama_kota = '$nama_kota'");

        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('Tidak Boleh Ada Duplikasi Data');</script>";
            echo "<script>location='?page=pengiriman';</script>";
            exit;
        }

        $query = $con->query("INSERT INTO pengiriman VALUES ('','$nama_kota', '$tarif')");

        if ($query != 0) {
            echo "<script>berhasil();</script>";
        } else {
            echo "<script>gagal();</script>";
        }
    }
?>
<!-- END -->

<!-- Fungsi Hapus pengiriman -->
<?php
    if (isset($_POST['btn-hapus'])) {
        $id_ongkir = $_POST['id_ongkir'];

        $query = $con->query("DELETE FROM pengiriman WHERE id_ongkir = $id_ongkir");

        if ($query != 0) {
            echo "<script>berhasil_hapus();</script>";
        } else {
            echo "<script>gagal_hapus();</script>";
        }
    }
?>
<!-- END -->