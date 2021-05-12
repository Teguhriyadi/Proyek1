
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <h3><i class="fa fa-envelope"></i> Data Informasi</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Informasi</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            Informasi Terkait Barang
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Informan</th>
                            <th>Informasi</th>
                            <th>Keterangan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM informasi JOIN users ON informasi.id_user = users.id ORDER BY users.created_at ASC");
                        $bgcolor = "";

                        ?>
                        <?php foreach ($query as $data_informasi) : ?>
                            <?php 
                            if ($no % 2 == 0) {
                                $bgcolor = "#F0F0F0";
                            } else {
                                $bgcolor = "";
                            }
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td><?php echo $data_informasi['username']; ?></td>
                                <td><?php echo $data_informasi['nama_informasi']; ?></td>
                                <td><?php echo $data_informasi['keterangan']; ?></td>
                                <td class="text-center">
                                    <?php if ($data_informasi['status'] == 0) : ?>
                                        <form method="POST" action="?page=aksi-terima-informasi">
                                            <input type="hidden" name="id_informasi" value="<?php echo $data_informasi['id_informasi']; ?>">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-thumbs-up"></i> Accept
                                            </button>
                                        </form>
                                    <?php else : ?>
                                        <form method="POST" action="?page=aksi-cancel-informasi">
                                            <input type="hidden" name="id_informasi" value="<?php echo $data_informasi['id_informasi']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-refresh"></i> Cancel
                                            </button>
                                        </form>
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