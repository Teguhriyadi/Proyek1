<?php

	include '../../../config/koneksi.php';

	if (isset($_POST['id_transaksi'])) {
		$id_transaksi = $_POST['id_transaksi'];

		$query = $con->query("SELECT * FROM transaksi_barang JOIN barang ON transaksi_barang.kode_barang = barang.kode_barang WHERE id_transaksi = $id_transaksi");

		$edit = $query->fetch_assoc();
	} else {
		echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
		echo "<script>location='../../?page=transaksi';</script>";
		exit;
	}

?>

<input type="hidden" name="id_transaksi" value="<?php echo $edit['id_transaksi']; ?>">
<div class="form-group">
	<label class="pull-left" for="kode_barang"> Kode Barang </label>
	<input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang" autocomplete="off" value="<?php echo $edit['kode_barang'] ?>" readonly>
</div>
<div class="form-group">
	<label class="pull-left" for="nama_barang"> Nama Barang </label>
	<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $edit['nama_barang']; ?>" readonly>
</div>
<div  class="form-group">
	<?php
		$kdBarang = $edit['kode_barang'];

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
				<?php if ($edit['status'] == 1) : ?>
					<option value="1" selected> Masuk </option>
					<option value="0">
						Keluar
					</option>
				<?php elseif ($edit['status'] == 0) : ?>
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