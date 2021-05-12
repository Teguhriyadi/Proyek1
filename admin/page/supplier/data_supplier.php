<?php

    $cari_kd = $con->query("SELECT MAX(kode_supplier) as kodeSup FROM supplier");
    $ketemu = $cari_kd->fetch_array();
    $kode = substr($ketemu['kodeSup'],1,4);
    $tambah = $kode+1;

    if ($tambah < 10) {
        $newID = "S000".$tambah;
    } else {
        $newID = "S00".$tambah;
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-users"></i> Data Supplier</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Supplier</li>
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
                            <th class="text-center">Kode Supplier</th>
                            <th>Nama Supplier</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM supplier ORDER BY kode_supplier ASC");
                        $bgcolor = "";
                        
                        ?>
                        <?php foreach ($query as $data_supplier) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td class="text-center"><?php echo $data_supplier['kode_supplier']; ?></td>
                                <td><?php echo $data_supplier['nama_supplier']; ?></td>
                                <td class="text-center"><?php echo $data_supplier['no_telepon']; ?></td>
                                <td class="text-center">
                                    <?php if ($data_supplier['status'] == 1) : ?>
                                        Aktif
                                    <?php elseif ($data_supplier['status'] == 0) : ?>
                                        Non - Aktif
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <button id="btn-edit-supplier" onclick="editSupplier('<?php echo $data_supplier['kode_supplier'] ?>')" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <form class="d-inline" method="POST" action="?page=hapus-supplier">
                                        <input type="hidden" name="kode_supplier" value="<?php echo $data_supplier['kode_supplier']; ?>">
                                        <button onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" type="submit" name="btn-hapus" class="btn btn-danger btn-sm">
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-simpan-supplier">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_supplier"> Kode Supplier </label>
                        <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Masukkan Kode Supplier" autocomplete="off" value="<?php echo $newID; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_supplier"> Nama Supplier </label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Nama Supplier" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon"> No. Telepon </label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="0" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" rows="4"></textarea>
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

<!-- Edit Data -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-supplier">
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

<script type="text/javascript">
    function editSupplier(kode_supplier) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/supplier/edit-supplier.php",
            type : "POST",
            data : { kode_supplier : kode_supplier },
            success : function (data) {
                $("#modal-update").html(data);
                return true;
            }
        })
    }
</script>