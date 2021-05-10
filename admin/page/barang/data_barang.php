<?php
    $query = "SELECT max(kode_barang) as maxKode from barang";
    $hasil = mysqli_query($con, $query);
    $data = $hasil->fetch_array();
    $kodeBarang = $data['maxKode'];

    $noUrut = (int) substr($kodeBarang, 3,3);
    $noUrut++;

    $char = "BR-";
    $newID = $char . sprintf("%03s", $noUrut);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-folder-open"></i> Data Barang</h3>
            <br>
        </div>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Barang</li>
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
                            <th class="text-center">Kode Barang</th>
                            <th>Nama</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Masuk</th>
                            <th class="text-center">Keluar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = $con->query("SELECT * FROM barang ORDER BY kode_barang ASC");
                        $bgcolor = "";
                        if (mysqli_num_rows($query)) {
                            while ($data_barang = $query->fetch_array()) {
                                if ($no % 2 == 0) {
                                    $bgcolor = "#F0F0F0";
                                } else {
                                    $bgcolor = "";
                                }
                                $kdBarang = $data_barang['kode_barang'];

                                $sql_masuk = $con->query("select sum(stok) as 'stok' from transaksi_barang where kode_barang = '$kdBarang' and status = 1");
                                $data_masuk = $sql_masuk->fetch_array();
                                $jum_masuk = $data_masuk['stok'];
                                $sql_keluar = $con->query("select sum(stok) as'stok' from transaksi_barang where kode_barang ='$kdBarang' and status = 0 ");
                                $data_keluar = $sql_keluar->fetch_array();
                                $jum_keluar = $data_keluar['stok'];
                                $jumlah_barang = $jum_masuk - $jum_keluar;
                                // $bgcolor = "";
                        
                        ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td class="text-center"><?php echo ++$no; ?>.</td>
                                <td class="text-center"><?php echo $data_barang['kode_barang']; ?></td>
                                <td><?php echo $data_barang['nama_barang']; ?></td>
                                <td class="text-center">Rp. <?php echo number_format($data_barang['harga']); ?></td>
                                <td class="text-center"><?php echo $jumlah_barang; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalTransaksiMasuk<?php echo $data_barang['kode_barang']; ?>"><i class="fa fa-plus"></i> Tambah
                                    </button>

                                    <div class="modal fade" id="exampleModalTransaksiMasuk<?php echo $data_barang['kode_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Transaksi Masuk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="?page=aksi-tambah-transaksi">
                                                <?php
                                                    $kode_barang = $data_barang['kode_barang'];
                                                    $queryTransaksiMasuk = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
                                                    foreach ($queryTransaksiMasuk as $data_transaksi_masuk) {
                                                        # code...
                                                    }
                                                ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="pull-left" for="kode_barang"> Kode Barang </label>
                                                        <input type="text" id="kode_barang" class="form-control" name="kode_barang" value="<?php echo $data_transaksi_masuk['kode_barang']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="pull-left" for="nama_barang"> Nama Barang </label>
                                                        <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?php echo $data_transaksi_masuk['nama_barang']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="pull-left" for="jumlah"> QTY </label>
                                                        <input type="number" id="jumlah" name="stok" class="form-control" placeholder="0">
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
                                </td>
                                <td class="text-center">
                                    <?php if ($jumlah_barang == 0) : ?>
                                        <b><i>Stok Kosong</i></b>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalTransaksiKeluar<?php echo $data_barang['kode_barang']; ?>"><i class="fa fa-minus"></i> Kurangi
                                        </button>
                                    <?php endif ?>

                                    <div class="modal fade" id="exampleModalTransaksiKeluar<?php echo $data_barang['kode_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-minus"></i> Kurangi Stok Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="?page=aksi-keluar-transaksi">
                                                <?php
                                                    $kode_barang = $data_barang['kode_barang'];
                                                    $queryTransaksiKeluar = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang' ");
                                                    foreach ($queryTransaksiKeluar as $data_transaksi_keluar) {
                                                        # code...
                                                    }
                                                ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="pull-left" for="kode_barang"> Kode Barang </label>
                                                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $data_transaksi_keluar['kode_barang'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="pull-left" for="nama_barang"> Nama Barang </label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?php echo $data_transaksi_keluar['nama_barang']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="pull-left" for="stok"> QTY </label>
                                                        <input type="number" class="form-control" id="stok" name="stok" placeholder="0" autocomplete="off" min="1">
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
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate<?php echo $data_barang['kode_barang']; ?>"><i class="fa fa-pencil"></i> Edit
                                    </button>

                                    <!-- Edit Data -->
                                    <div class="modal fade" id="exampleModalUpdate<?php echo $data_barang['kode_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Edit Data Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="?page=aksi-edit-barang">
                                                    <?php
                                                        $kode_barang = $data_barang['kode_barang'];
                                                        $queryBarang = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
                                                        foreach ($queryBarang as $barang_data) {

                                                        }
                                                    ?>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="pull-left" for="kode_barang"> Kode Barang </label>
                                                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $barang_data['kode_barang']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="pull-left" for="id_kategori"> Kategori </label>
                                                                    <select id="id_kategori" name="id_kategori" class="form-control">
                                                                        <option value="">- Pilih -</option>
                                                                        <?php
                                                                            $queryKategori = $con->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                                                                        ?>
                                                                        <?php foreach ($queryKategori as $kategori_data) : ?>
                                                                            <?php if ($barang_data['id_kategori'] == $kategori_data['id_kategori']) : ?>
                                                                            <option value="<?php echo $kategori_data['id_kategori']; ?>" selected>
                                                                                <?php echo $kategori_data['nama_kategori']; ?>
                                                                            </option>
                                                                            <?php else : ?>
                                                                            <option value="<?php echo $kategori_data['id_kategori']; ?>">
                                                                                <?php echo $kategori_data['nama_kategori']; ?>
                                                                            </option>
                                                                            <?php endif ?> 
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="pull-left" for="nama_barang"> Nama Barang </label>
                                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off" value="<?php echo $barang_data['nama_barang']; ?>">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="pull-left" for="harga"> Harga </label>
                                                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="0" autocomplete="off" value="<?php echo $barang_data['harga']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="satuan"> Satuan </label>
                                                                    <select id="satuan" name="satuan" class="form-control">
                                                                    <?php if ($barang_data['satuan'] == "pcs") : ?>
                                                                        <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option selected>
                                                                        <option value="kg">KG</option>
                                                                        <option value="ml">ML</option>
                                                                        <option value="setengah">1/2</option>
                                                                        <option value="tiga_per_empat">3/4</option>
                                            <?php elseif ($barang_data['satuan'] == "kg") : ?>
                                                <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option>
                                                                        <option value="kg" selected>KG</option>
                                                                        <option value="ml">ML</option>
                                                                        <option value="setengah">1/2</option>
                                                                        <option value="tiga_per_empat">3/4</option>
                                            <?php elseif ($barang_data['satuan'] == "ml") : ?>
                                                <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option>
                                                                        <option value="kg">KG</option>
                                                                        <option value="ml" selected>ML</option>
                                                                        <option value="setengah">1/2</option>
                                                                        <option value="tiga_per_empat">3/4</option>
                                                                        <?php elseif ($barang_data['satuan'] == "setengah") : ?>
                                                                        <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option>
                                                                        <option value="kg">KG</option>
                                                                        <option value="ml">ML</option>
                                                                        <option value="setengah" selected>1/2</option>
                                                                        <option value="tiga_per_empat">3/4</option>
                                                                        <?php elseif ($barang_data['satuan'] == "tiga_per_empat") : ?>
                                                                        <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option>
                                                                        <option value="kg">KG</option>
                                                                        <option value="ml">ML</option>
                                                                        <option value="setengah">1/2</option>
                                                                        <option value="tiga_per_empat" selected>3/4</option>
                                                                        <?php else : ?>
                                                                        <option value="">- Pilih -</option>
                                                                        <option value="pcs">PCS</option>
                                                                        <option value="kg">KG</option>
                                                                        <option value="ml">ML</option>
                                                                        <option value="setengah">1/2</option>
                                                                        <option value="tiga_per_empat">3/4</option>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="pull-left" for="keterangan"> Keterangan </label>
                                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan"><?php echo $barang_data['keterangan']; ?></textarea>
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
                                    <!-- END -->

                                    <a onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" href="?page=hapus-barang&kode_barang=<?php echo $barang_data['kode_barang']; ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-simpan-barang">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_barang"> Kode Barang </label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $newID; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori"> Kategori </label>
                                <select id="id_kategori" name="id_kategori" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <?php
                                        $queryKategori = $con->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
                                    ?>
                                    <?php foreach ($queryKategori as $kategori_data) : ?>
                                        <option value="<?php echo $kategori_data['id_kategori']; ?>">
                                            <?php echo $kategori_data['nama_kategori']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang"> Nama Barang </label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="harga"> Harga </label>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="0" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="satuan"> Satuan </label>
                                <select id="satuan" name="satuan" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="pcs">PCS</option>
                                    <option value="kg">KG</option>
                                    <option value="ml">ML</option>
                                    <option value="setengah">1/2</option>
                                    <option value="tiga_per_empat">3/4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan"></textarea>
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