<?php
include '../../../config/koneksi.php';

if (isset($_POST['kode_barang'])) {
    $kode_barang = $_POST['kode_barang'];

    $query = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'");

    $edit = $query->fetch_assoc();
} else {
    echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
    echo "<script>location='../../?page=barang';</script>";
    exit;
}

?>

<div class="form-group">
    <label for="kode_barang"> Kode Barang </label>
    <input type="text" id="kode_barang" class="form-control" name="kode_barang" value="<?php echo $edit['kode_barang']; ?>" readonly>
</div>
<div class="form-group">
    <label for="nama_barang"> Nama Barang </label>
    <input type="text" id="nama_barang" class="form-control" name="nama_barang" value="<?php echo $edit['nama_barang']; ?>" readonly>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="jumlah"> QTY </label>
            <input type="number" id="jumlah" name="stok" class="form-control" placeholder="0" autocomplete="off" min="1">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="kode_supplier"> Nama Supplier </label>
    <select id="kode_supplier" name="kode_supplier" class="form-control">
        <option value="">- Pilih -</option>
        <?php
            $querySupplier = $con->query("SELECT * FROM supplier ORDER BY kode_supplier ASC");
        ?>
        <?php foreach ($querySupplier as $querySup) : ?>
            <option value="<?php echo $querySup['kode_supplier']; ?>">
                <?php echo $querySup['nama_supplier']; ?>
            </option>
        <?php endforeach ?>
    </select>
</div>