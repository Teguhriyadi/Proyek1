<?php
	include '../../../config/koneksi.php';
	
	if (isset($_POST['id_ongkir'])) {
		$id_ongkir = $_POST['id_ongkir'];

		$query = $con->query("SELECT * FROM pengiriman WHERE id_ongkir = $id_ongkir");

		$edit = $query->fetch_assoc();
	} else {
		echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
		echo "<script>location='../../?page=pengiriman';</script>";
		exit;
	}
	
?>

<input type="hidden" name="id_ongkir" value="<?php echo $edit['id_ongkir']; ?>">
<div class="form-group">
	<label class="nama_kota"> Nama Pengiriman </label>
	<input type="text" id="nama_kota" class="form-control" name="nama_kota" autocomplete="off" placeholder="Masukkan Nama Kota" value="<?php echo $edit['nama_kota'] ?>">
</div>
<div class="form-group">
	<label class="tarif"> Tarif </label>
	<input type="number" id="tarif" class="form-control" name="tarif" placeholder="Masukkan Tarif" autocomplete="off" value="<?php echo $edit['tarif'] ?>" min="1">
</div>