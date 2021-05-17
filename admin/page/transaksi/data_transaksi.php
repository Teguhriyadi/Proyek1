<script type="text/javascript">
    function editTransaksi(id_transaksi) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/transaksi/edit-transaksi.php",
            type : "POST",
            data : { id_transaksi : id_transaksi },
            success : function (data) {
                $("#modal-update").html(data);
                return true;
            }
        })
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
            window.location.replace("?page=transaksi");
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
            window.location.replace("?page=transaksi");
        }, 3000);
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-pencil"></i> Data Transaksi</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Transaksi</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            Transaksi Barang Masuk & Keluar
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Status</th>
                            <th>Supplier</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM transaksi_barang JOIN barang ON transaksi_barang.kode_barang = barang.kode_barang LEFT JOIN supplier ON transaksi_barang.kode_supplier = supplier.kode_supplier ORDER BY tanggal ASC");
                        $bgcolor = "";

                        ?>
                        <?php foreach ($query as $data_transaksi_barang) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td class="text-center"><?php echo $data_transaksi_barang['kode_barang']; ?></td>
                                <td><?php echo $data_transaksi_barang['nama_barang']; ?></td>
                                <td class="text-center"><?php echo $data_transaksi_barang['stok']; ?></td>
                                <td class="text-center"><?php echo $data_transaksi_barang['tanggal']; ?></td>
                                <td class="text-center">
                                    <?php if ($data_transaksi_barang['status'] == 1) : ?>
                                        Masuk
                                    <?php elseif ($data_transaksi_barang['status'] == 0) : ?>
                                        Keluar
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif ?>
                                </td>
                                <td class="">
                                    <?php if ($data_transaksi_barang['kode_supplier'] == "") : ?>
                                        -
                                    <?php else : ?>
                                        <?php echo $data_transaksi_barang['nama_supplier']; ?>
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <button onclick="editTransaksi(<?php echo $data_transaksi_barang['id_transaksi']; ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <form class="d-inline" method="POST">
                                        <input type="hidden" name="id_transaksi" value="<?php echo $data_transaksi_barang['id_transaksi']; ?>">
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

<!-- Update Data -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-transaksi">
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

<!-- Fungsi Hapus Data -->
<?php
    if (isset($_POST['btn-hapus'])) {
        $id_transaksi = $_POST['id_transaksi'];

        $query = $con->query("DELETE FROM transaksi_barang WHERE id_transaksi = $id_transaksi");

        if ($query != 0) {
            echo "<script>berhasil_hapus();</script>";
        } else {
            echo "<script>gagal_hapus();</script>";
        }
    }
?>
<!-- END -->