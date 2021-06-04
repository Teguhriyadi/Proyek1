<script type="text/javascript">
    function editBarang(kode_barang) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/barang/edit-barang.php",
            type : "POST",
            data : { kode_barang : kode_barang },
            success : function (data) {
                $("#modal-update").html(data);
                return true;
            }
        })
    }

    function tambahTransaksiBarang(kode_barang) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/barang/transaksi-masuk.php",
            type : "POST",
            data : { kode_barang : kode_barang },
            success : function (data) {
                $("#modal-transaksi-masuk").html(data);
                return true;
            }
        })
    }

    function kurangiTransaksiBarang(kode_barang) {
        $.ajax({
            url : "http://localhost/Proyek1/admin/page/barang/transaksi-keluar.php",
            type : "POST",
            data : { kode_barang : kode_barang },
            success : function (data) {
                $("#modal-transaksi-keluar").html(data);
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
            window.location.replace("?page=barang");
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
            window.location.replace("?page=barang");
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
            window.location.replace("?page=barang");
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
            window.location.replace("?page=barang");
        }, 3000);
    }
</script>

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
            <a href="../admin/cetak.php" class="btn btn-danger btn-sm pull-right">
                <i class="fa fa-envelope"></i> Cetak PDF
            </a>
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
 //                               $jumlah_barang = $jum_masuk - $jum_keluar;

                                $sql_beli_masuk = $con->query("SELECT sum(jumlah) as 'jumlah_masuk' FROM pembelian_barang WHERE kode_barang = '$kdBarang'");

                                $data_beli_masuk = $sql_beli_masuk->fetch_array();
                                $jum_beli_masuk = $data_beli_masuk['jumlah_masuk'];
                                $jum = $jum_masuk - $jum_keluar - $jum_beli_masuk;
                                // $bgcolor = "";

                                ?>
                                <tr bgcolor="<?php echo $bgcolor; ?>">
                                    <td class="text-center"><?php echo ++$no; ?>.</td>
                                    <td class="text-center"><?php echo $data_barang['kode_barang']; ?></td>
                                    <td><?php echo $data_barang['nama_barang']; ?></td>
                                    <td class="text-center">Rp. <?php echo number_format($data_barang['harga']); ?></td>
                                    <td class="text-center"><?php echo $jum; ?></td>
                                    <td class="text-center">
                                        <button onclick="tambahTransaksiBarang('<?php echo $data_barang['kode_barang']; ?>')" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalTransaksiMasuk"><i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($jum == 0) : ?>
                                            <b><i>Stok Kosong</i></b>
                                        <?php else : ?>
                                            <button onclick="kurangiTransaksiBarang('<?php echo $data_barang['kode_barang']; ?>')" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalTransaksiKeluar"><i class="fa fa-minus"></i> Kurangi
                                            </button>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <button onclick="editBarang('<?php echo $data_barang['kode_barang'] ?>')" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalUpdate"><i class="fa fa-pencil"></i> Edit
                                        </button>
                                        <!-- END -->

                                        <form class="d-inline" method="POST">
                                            <input type="hidden" name="kode_barang" value="<?php echo $data_barang['kode_barang']; ?>">
                                            <button onclick="return confirm('Yakin ? Anda Ingin Menghapus Data Ini ?')" name="btn-hapus" type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i> Hapus
                                            </button>
                                        </form>
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
            <form method="POST" enctype="multipart/form-data">
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
                        <label for="foto"> Foto </label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="keterangan"> Keterangan </label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Masukkan Keterangan"></textarea>
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

<!-- Tambah Data -->
<div class="modal fade" id="exampleModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-edit-barang" enctype="multipart/form-data">
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

<!-- Transaksi Masuk -->
<div class="modal fade" id="exampleModalTransaksiMasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Transaksi Masuk Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-tambah-transaksi">
                <div class="modal-body" id="modal-transaksi-masuk">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Transaksi Keluar -->
<div class="modal fade" id="exampleModalTransaksiKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-minus"></i> Transaksi Keluar Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="?page=aksi-keluar-transaksi">
                <div class="modal-body" id="modal-transaksi-keluar">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" name="btn-kurangi" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i> Kurangi </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Fungsi Tambah Data -->
<?php
if (isset($_POST['btn-simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $id_kategori = $_POST['id_kategori'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

        if ($error == 4) { // 4 adalah jumlah dari error
            echo "<script>alert('Pilih Gambar Dahulu');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('Bukan Gambar');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }
        if ($ukuranfile > 1000000) {
            echo "<script>alert('Ukuran Terlalu besar');</script>";
            echo "<script>window.location.replace('?page=barang');</script>";
            exit;
        }

        // gambar siap di upload
        // generate nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        move_uploaded_file($tmpname, 'page/img/' . $namafilebaru);

        $query = $con->query("INSERT INTO barang VALUES('$kode_barang', '$id_kategori' ,'$nama_barang','$harga','$satuan','$keterangan', '$namafilebaru')");

        if ($query != 0) {
            echo "<script>berhasil();</script>";
        } else {
            echo "<script>gagal();</script>";
        }
    }
    ?>

    <!-- END -->

    <!-- Fungsi Hapus Data -->
    <?php
    if (isset($_POST['btn-hapus'])) {
        $kode_barang = $_POST['kode_barang'];

        $sql = mysqli_query($con, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        $data = $sql->fetch_array();
        $foto = $data['foto'];
        
        if (file_exists("page/img/$foto")) {
            unlink("page/img/$foto");
        }

        $query = $con->query("DELETE FROM barang WHERE kode_barang = '$kode_barang' ");

        if ($query != 0) {
            echo "<script>berhasil_hapus();</script>";
        } else {
            echo "<script>gagal_hapus();</script>";
        }
    }
    ?>
<!-- END -->