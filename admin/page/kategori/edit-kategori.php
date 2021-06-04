
<?php
	include '../../../config/koneksi.php';
	
	if (isset($_POST['id_kategori'])) {
		$id_kategori = $_POST['id_kategori'];

		$query = $con->query("SELECT * FROM kategori WHERE id_kategori = $id_kategori");

		$edit = $query->fetch_assoc();
	} else {
		echo "<script>alert('Maaf, Anda Tidak Bisa Sembarang Akses Halaman Ini!');</script>";
		echo "<script>location='../../?page=kategori';</script>";
		exit;
	}
	
?>

<input type="hidden" name="id_kategori" value="<?php echo $edit['id_kategori']; ?>">
<div class="form-group">
	<label class="nama_kategori"> Nama Kategori </label>
	<input type="text" id="nama_kategori" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori" value="<?php echo $edit['nama_kategori']; ?>" autocomplete="off">
</div>