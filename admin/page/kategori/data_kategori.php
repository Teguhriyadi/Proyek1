
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-bars"></i> Data Kategori</h3>
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
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                        $bgcolor = "";

                        ?>
                        <?php foreach ($query as $data_kategori) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td><?php echo $data_kategori['nama_kategori']; ?></td>
                                <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate<?php echo $data_kategori['id_kategori'] ?>"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <!-- Tambah Data -->
                                    <div class="modal fade" id="exampleModalUpdate<?php echo $data_kategori['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Data Kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="">
                                                    <?php
                                                        $id_kategori = $data_kategori['id_kategori'];
                                                        $query = $con->query("SELECT * FROM kategori WHERE id_kategori = $id_kategori");
                                                        foreach ($query as $kategori_data) {
                                                            # code...
                                                        }
                                                    ?>
                                                    <input type="hidden" name="id_kategori" value="<?php echo $kategori_data['id_kategori']; ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="pull-left" for="nama_kategori"> Nama Kategori </label>
                                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" autocomplete="off" value="<?php echo $kategori_data['nama_kategori']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                                                        <button type="submit" name="btn-simpan" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END -->

                                    <a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="?page=hapus-kategori&id_kategori=<?php echo $data_kategori['id_kategori']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
            <form method="POST" action="?page=aksi-simpan-kategori">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori"> Nama Kategori </label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->