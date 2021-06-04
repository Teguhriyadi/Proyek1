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

<?php
$id_pembelian = $_GET['id_pembelian'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-money"></i> Data Pembayaran</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Kategori</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            Detail
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_pembelian = $_GET['id_pembelian'];

                        $query = $con->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pembelian'");

                        $data = $query->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo $data['nama_pelanggan']; ?></td>
                            <td><?php echo $data['bank']; ?></td>
                            <td>Rp. <?php echo number_format($data['jumlah']); ?></td>
                            <td class="text-center"><?php echo $data['tanggal']; ?></td>
                            <td class="text-center">
                                <img src="bukti_pembayaran/<?php echo $bukti_pembayaran; ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> No. Pengiriman </label>
                            <input type="number" class="form-control" name="no_pengiriman" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label> Status </label>
                            <select class="form-control" name="status_pembelian">
                                <option value="">- Pilih -</option>
                                <option value="lunas"> Lunas </option>
                                <option value="barang_dikirim"> Barang Dikirim </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="btn-proses" class="btn btn-success btn-sm">
                        <i class="fa fa-money"></i> Proses
                    </button>
                </div>
            </form>
            <?php
                if (isset($_POST['btn-proses'])) {
                    $no_pengiriman = $_POST['no_pengiriman'];
                    $status_pembelian = $_POST['status_pembelian'];

                    $query = $con->query("UPDATE pembelian SET status_pembelian = '$status_pembelian' , resi_pengiriman = '$no_pengiriman' WHERE id_pembelian = '$id_pembelian' ");

                    if ($query != 0) {
                        echo "<script>alert('Data Berhasil di Ubah');</script>";
                        echo "<script>window.location.replace('?page=pembelian');</script>";
                    } else {
                        echo "<script>alert('Data Gagal di Ubah');</script>";
                        echo "<script>window.location.replace('?page=pembayaran&id_pembelian=$id_pembelian');</script>";
                    }
                }
            ?>
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