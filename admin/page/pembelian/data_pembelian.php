<?php

    if (!defined('access')) {
        echo "<script>alert('Maaf, Anda Tidak Berhak Masuk Ke Halaman Ini');</script>";
        echo "<script>window.location.replace('../../?page=dashboard');</script>";
        exit;
    }

?>
<script type="text/javascript">
    function editKategori(id_kategori) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/kategori/edit-kategori.php",
            type : "POST",
            data : { id_kategori : id_kategori },
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
            window.location.replace("?page=kategori");
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
            window.location.replace("?page=kategori");
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
            window.location.replace("?page=kategori");
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
            window.location.replace("?page=kategori");
        }, 3000);
    }

    function duplikasi_data() {
        setTimeout(function() {
            swal({
                title : 'GAGAL',
                text : 'Tidak Boleh Ada Duplikasi Data',
                type : 'error',
                showConfirmationButton : true
            });
        });
        window.setTimeout(function() {
            window.location.replace("?page=kategori");
        }, 3000);
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-money"></i> Data Pembelian</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Pembelian</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            Data Pembelian
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Pelanggan</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status Pembelian</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
                        $bgcolor = "";

                        ?>
                        <?php foreach ($query as $data_pembelian) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td><?php echo $data_pembelian['nama_pelanggan'] ?></td>
                                <td class="text-center"><?php echo $data_pembelian['tanggal_pembelian'] ?></td>
                                <td class="text-center">
                                    <?php if ($data_pembelian['status_pembelian'] == "barang_dikirim") : ?>
                                        Barang Dikirim
                                    <?php elseif($data_pembelian['status_pembelian'] == "lunas") : ?>
                                        Lunas
                                    <?php elseif($data_pembelian['status_pembelian'] == "pending") : ?>
                                        Pending
                                    <?php elseif($data_pembelian['status_pembelian'] == "sudah kirim pembayaran") : ?>
                                        Sudah Kirim Pembayaran
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif ?>
                                </td>
                                <td class="text-center">Rp. <?php echo number_format($data_pembelian['total_pembelian']); ?></td>
                                <td class="text-center">
                                    <a href="?page=detail_pembelian&id_pembelian=<?php echo $data_pembelian['id_pembelian']; ?>" class="btn btn-info btn-sm">
                                        <i class="fa fa-search"></i> Detail
                                    </a>
                                    <?php if ($data_pembelian['status_pembelian'] == "barang_dikirim") : ?>

                                    <?php else : ?>
                                        <a href="?page=pembayaran&id_pembelian=<?php echo $data_pembelian['id_pembelian']; ?>" class="btn btn-success btn-sm">
                                            <i class="fa fa-money"></i> Pembayaran
                                        </a>
                                    <?php endif ?>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori"> Nama Kategori </label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" autocomplete="off">
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-kategori">
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

<!-- Fungsi Tambah Kategori -->
<?php
    if (isset($_POST['btn-simpan'])) {
        $nama_kategori = $_POST['nama_kategori'];

        $result = $con->query("SELECT nama_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'");

        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('Tidak Boleh Ada Duplikasi Data');</script>";
            echo "<script>location='?page=kategori';</script>";
            exit;
        }

        $query = $con->query("INSERT INTO kategori VALUES ('','$nama_kategori', '')");

        if ($query != 0) {
            echo "<script>berhasil();</script>";
        } else {
            echo "<script>gagal();</script>";
        }
    }
?>
<!-- END -->

<!-- Fungsi Hapus Kategori -->
<?php
    if (isset($_POST['btn-hapus'])) {
        $id_kategori = $_POST['id_kategori'];

        $query = $con->query("DELETE FROM kategori WHERE id_kategori = $id_kategori");

        if ($query != 0) {
            echo "<script>berhasil_hapus();</script>";
        } else {
            echo "<script>gagal_hapus();</script>";
        }
    }
?>
<!-- END -->