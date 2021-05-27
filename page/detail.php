
<br>
<div class="container">
	<div class="row">
		<?php
		$kode_barang = $_GET['kode_barang'];
		$query = $con->query("SELECT * FROM barang WHERE kode_barang = '$kode_barang' ");
		
		foreach ($query as $edit) {
			# code...
		}

		?>
		<div class="card w-100">
			<div class="card-header">
				Barang <b><?php echo $edit['nama_barang'] ?></b>
			</div>
			<div class="card-body">
				<img src="admin/page/img/<?php echo $edit['foto'] ?>" width="300">
				<br><br>
				<form method="POST">
					<input type="number" class="form-control" name="jumlah" min="1">
					<br>
					<button type="submit" name="beli" class="btn btn-primary btn-sm btn-block">
						<i class="fa fa-shopping-cart"></i> Beli
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if (isset($_POST['beli'])) {
		$jumlah = $_POST['jumlah'];
		$_SESSION['keranjang'][$kode_barang] = $jumlah;	

		echo "<script>alert('Pesanan Sudah Masuk ke Keranjang');</script>";
		echo "<script>location='?page=keranjang';</script>";	
	}
?>