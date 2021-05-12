<?php

	include '../../../config/koneksi.php';

	if (isset($_POST['kode_supplier'])) {
		$kode_supplier = $_POST['kode_supplier'];

		$query = $con->query("SELECT * FROM supplier WHERE kode_supplier = '$kode_supplier' ");

		$edit = $query->fetch_assoc();
	} else {
		echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
		echo "<script>location='../../?page=supplier';</script>";
		exit;
	}

?>


<div class="form-group">
	<label for="kode_supplier"> Kode Supplier </label>
	<input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Masukkan Kode Supplier" autocomplete="off" value="<?php echo $edit['kode_supplier']; ?>" readonly>
</div>
<div class="form-group">
	<label for="nama_supplier"> Nama Supplier </label>
	<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Nama Supplier" autocomplete="off" value="<?php echo $edit['nama_supplier']; ?>">
</div>
<div class="form-group">
	<label for="no_telepon"> No. Telepon </label>
	<input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="0" autocomplete="off" value="<?php echo $edit['no_telepon']; ?>">
</div>
<div class="form-group">
	<label for="keterangan"> Keterangan </label>
	<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" rows="4"><?php echo $edit['keterangan']; ?></textarea>
</div>
