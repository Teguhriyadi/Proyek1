
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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM transaksi_barang JOIN barang ON transaksi_barang.kode_barang = barang.kode_barang ORDER BY tanggal ASC");
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
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate<?php echo $data_transaksi_barang['id_transaksi']; ?>"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <!-- Tambah Data -->
                                    <div class="modal fade" id="exampleModalUpdate<?php echo $data_transaksi_barang['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Transaksi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="?page=aksi-edit-transaksi">
                                                    <?php 
                                                        $id_transaksi = $data_transaksi_barang['id_transaksi'];
                                                        $queryTransaksiBarang = $con->query("SELECT * FROM transaksi_barang JOIN barang ON transaksi_barang.kode_barang = barang.kode_barang WHERE id_transaksi = '$id_transaksi'");
                                                        foreach ($queryTransaksiBarang as $transaksi_barang) {
                                                            # code...
                                                        }
                                                    ?>
                                                    <input type="hidden" name="id_transaksi" value="<?php echo $transaksi_barang['id_transaksi']; ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="pull-left" for="kode_barang"> Kode Barang </label>
                                                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $transaksi_barang['kode_barang'] ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="pull-left" for="nama_barang"> Nama Barang </label>
                                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $transaksi_barang['nama_barang']; ?>" readonly>
                                                        </div>
                                                        <div  class="form-group">
                                                        <?php
                                                            $kdBarang = $data_transaksi_barang['kode_barang'];

                                                            $sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kdBarang' and status = 1");
                                                            $data_masuk = $sql_masuk->fetch_array();
                                                            $jum_masuk = $data_masuk['stok'];
                                                            $sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kdBarang' and status = 0 ");
                                                            $data_keluar = $sql_keluar->fetch_array();
                                                            $jum_keluar = $data_keluar['stok'];
                                                            $jumlah_barang = $jum_masuk - $jum_keluar;
                                                        ?>
                                                            <label class="pull-left" for="stok"> Stok Keseluruhan </label>
                                                            <input type="text" id="stok" class="form-control" value="<?php echo $jumlah_barang; ?>" readonly>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                <label class="pull-left" for="stok"> QTY </label>
                                                                <input type="number" id="stok" class="form-control" name="stok" placeholder="0" autocomplete="off" min="1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="pull-left" for="status"> Status </label>
                                                                    <select id="status" class="form-control" name="status">
                                                                        <option value="">- Pilih -</option>
                                                                        <?php if ($transaksi_barang['status'] == 1) : ?>
                                                                            <option value="1" selected> Masuk </option>
                                                                            <option value="0">
                                                                                Keluar
                                                                            </option>
                                                                        <?php elseif ($transaksi_barang['status'] == 0) : ?>
                                                                            <option value="1"> Masuk </option>
                                                                            <option value="0" selected>
                                                                                Keluar
                                                                            </option>
                                                                        <?php else : ?>
                                                                            <option value="1"> Masuk </option>
                                                                            <option value="0">
                                                                                Keluar
                                                                            </option>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="?page=hapus-transaksi&id_transaksi=<?php echo $data_transaksi_barang['id_transaksi']; ?>" class="btn btn-danger btn-sm">
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