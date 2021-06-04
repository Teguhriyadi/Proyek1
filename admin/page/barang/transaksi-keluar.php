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
<div class="form-group">
    <label for="jumlah"> QTY </label>
    <input type="number" id="jumlah" name="stok" class="form-control" placeholder="0" min="1" max="" autocomplete="off">
</div>